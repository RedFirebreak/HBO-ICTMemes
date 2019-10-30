  <?php
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
        $query = "SELECT `user-id`, `usermail`, `username`, `userrole`, `is_verified`, `gebanned` FROM user WHERE username='$username'";
        $results = mysqli_query($dbConnection, $query);
        $row = mysqli_fetch_assoc($results);

        // Check if the query succeeded
          if (mysqli_num_rows($results) == 1) {
          //Set it into session :)
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['user-id'];
            $_SESSION['usermail'] = $row['usermail'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['userrole'] = $row['userrole'];
            $_SESSION['is_verified'] = $row['is_verified'];
            $_SESSION['banned'] = $row['gebanned'];

          //Set variables, this will also be done in the header
            $Loggedin = $_SESSION['loggedin'];
            $LoggedinID = $_SESSION['userid'];
            $LoggedinUsermail = $_SESSION['usermail'];
            $LoggedinUsername = $_SESSION['username'];
            $LoggedinUserrole = $_SESSION['userrole'];
            $LoggedinVerified = $_SESSION['is_verified'];
            $LoggedinGebanned = $_SESSION['banned'];

          echo "<div class='alert alert-success' role='alert'>";
          echo "Success! Je bent nu ingelogd. Over 3 seconden wordt je doorgestuurd naar de homepagina.";
          echo "</div>";
          header("Refresh:3; url=../index.php");
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
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Username of password combinatie niet correct. Probeer het opnieuw.";
        echo "</div>";
        return;
      }
    }
    ?>