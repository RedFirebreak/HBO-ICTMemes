  <?php
  // First check if recaptcha was valid
  if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
    $recaptcha = recaptchaverwerk($captcha);
  } else {
    // Well, captcha wasn't entered so the form wasn't touched. Stop the rest!
    return;
  }
    if (!$recaptcha){
      echo "<div class='alert alert-danger' role='alert'>";
      echo "Recaptcha is niet ingevuld, niet correct of is verlopen. Probeer het nog eens.";
      echo "</div>";
      return;
    }
//captcha check done!

    if (isset($_POST['username'])) {
      $username = mysqli_real_escape_string($dbConnection, $_POST['username']);
      $password = mysqli_real_escape_string($dbConnection, $_POST['password']);

      if (empty($username)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Username moet ingevuld worden";
        echo "</div>";
        return;
      }
      if (empty($password)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Password moet ingevuld worden";
        echo "</div>";
        return;
      }

      $password = md5($password);
      $query = "SELECT `username`, `wachtwoord` FROM user WHERE username='$username' AND wachtwoord='$password'";
      $results = mysqli_query($dbConnection, $query);

      //If exactly one user returns, log him in! The username/password checks out

      if (mysqli_num_rows($results) == 1) {

        // Get all important info from the user
        $query = "SELECT `user-id`, `usermail`, `username`, `userrole`, `is_verified`, `gebanned`, `schoolnaam` FROM user WHERE username='$username'";
        $results = mysqli_query($dbConnection, $query);
        $row = mysqli_fetch_assoc($results);

        // Check if the query succeeded
          if (mysqli_num_rows($results) == 1) {

            // Check of de user gebanned is
            $banned= $row['gebanned'];
            $verified= $row['is_verified'];

            if ($banned == 1) {
              echo "<div class='alert alert-danger' role='alert'>";
              echo "Helaas, het ziet er naar uit dat je account gebanned is. Neem contact op det de support als je het hier niet mee eens bent.";
              echo "</div>";
              session_destroy();
              return;
            }

            if ($verified == 0) {
              $LoggedinUsermail = $row['usermail'];
              $LoggedinUsername = $row['username'];
              echo "<div class='alert alert-info' role='alert'>";
              echo "Welkom! Het ziet er naar uit dat je email nog niet verifieerd is.<br>Geen code ontvangen?
              <a href='login.php?sendverification=1&email=$LoggedinUsermail&username=$LoggedinUsername'>Klik hier om een nieuwe te ontvangen</a>";
              echo "</div>";
              session_destroy();
              return;
            }

          //Set it into session :)
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['user-id'];
            $_SESSION['usermail'] = $row['usermail'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['userrole'] = $row['userrole'];
            $_SESSION['is_verified'] = $row['is_verified'];
            $_SESSION['banned'] = $row['gebanned'];
            $_SESSION['schoolnaam'] = $row['schoolnaam'];

          //Set variables, this will also be done in the header
            $Loggedin = $_SESSION['loggedin'];
            $LoggedinID = $_SESSION['userid'];
            $LoggedinUsermail = $_SESSION['usermail'];
            $LoggedinUsername = $_SESSION['username'];
            $LoggedinUserrole = $_SESSION['userrole'];
            $LoggedinVerified = $_SESSION['is_verified'];
            $LoggedinGebanned = $_SESSION['banned'];
            $LoggedinSchool = $_SESSION['schoolnaam'];

            //Update laatste login
            $query = "UPDATE `user` SET `laatste_login`=CURRENT_TIMESTAMP WHERE `user-ID`=$LoggedinID";
            $results = mysqli_query($dbConnection, $query);
            if (!$results) {
              Customlog("login", "error", "Laatste login kon niet worden geupdate voor $username (UserID: $LoggedinID)");
            }
            // Zet aantal foute logins op 0
            $query = "UPDATE `user` SET `aantal_foute_logins`='0' WHERE username='$username'";
            $results = mysqli_query($dbConnection, $query);
            if (!$results) {
              Customlog("login", "error", "aantal_foute_logins kon niet naar 0 worden gezet voor $username (UserID: $LoggedinID)");
            }

          echo "<div class='alert alert-success' role='alert'>";
          echo "Success! Je bent nu ingelogd. Over 1 seconden wordt je doorgestuurd naar de homepagina.";
          echo "</div>";
          header("Refresh:1; url=../index.php");
          return;
        } else {
          $_SESSION['loggedin'] = false;
          Customlog("login", "error", "A user just tried logging in, but the query could not get their userinfo (Username: $username )");
          echo "<div class='alert alert-danger' role='alert'>";
          echo "Er is een fout opgetreden met het ophalen van je profiel. De administrators zijn op de hoogte gebracht";
          echo "</div>";
          return;
        }
      } else {
        $_SESSION['loggedin'] = false;

        //Update laatste login
          // Check of de username goed was
          $query = "SELECT count(*) aantal FROM user WHERE username='$username'";
          $results = mysqli_query($dbConnection, $query);
          $row = mysqli_fetch_assoc($results);
          
          $accountmatch = $row['aantal'];
          if ($accountmatch == 1) {
            // als de username goed was, update de "foute pogingen"
            $query = "SELECT aantal_foute_logins fout FROM user WHERE username='$username'";
            $results = mysqli_query($dbConnection, $query);
            $row = mysqli_fetch_assoc($results);
            $aantalfoutepogingen = $row['fout'];
            if ($results) {
              $aantalfoutepogingen++;
              $query = "UPDATE `user` SET `aantal_foute_logins`='$aantalfoutepogingen' WHERE username='$username'";
              $results = mysqli_query($dbConnection, $query);
            }
          }
          echo "<div class='alert alert-danger' role='alert'>";
          echo "Username of password combinatie niet correct. Probeer het opnieuw.";
          echo "</div>";

        return;
      }
    }
    ?>