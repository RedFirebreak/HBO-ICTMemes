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

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($dbConnection, $_POST['username']);
  $email = mysqli_real_escape_string($dbConnection, $_POST['email']);
  $password_1 = mysqli_real_escape_string($dbConnection, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($dbConnection, $_POST['password_2']);
  $school = mysqli_real_escape_string($dbConnection, $_POST['school']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
      //array_push($errors, "Username is verplicht");
      echo "<div class='alert alert-danger' role='alert'>";
      echo "Username is verplicht.";
      echo "</div>";
      return;
    }
  if (empty($email)) {
      //array_push($errors, "Email is required");
      echo "<div class='alert alert-danger' role='alert'>";
      echo "Email is verplicht.";
      echo "</div>";
      return;
    }
  if (empty($password_1)) {
      //array_push($errors, "Password is required");
      echo "<div class='alert alert-danger' role='alert'>";
      echo "Password is verplicht.";
      echo "</div>";
      return;
    }
  if ($password_1 != $password_2) {
    //array_push($errors, "The two passwords do not match");
    echo "<div class='alert alert-danger' role='alert'>";
    echo "De twee passwords komen niet overeen.";
    echo "</div>";
    return;
  }
  // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password_1);
    $lowercase = preg_match('@[a-z]@', $password_1);
    $number    = preg_match('@[0-9]@', $password_1);

    //Maak de eventuele error message klaar
    $passreqerror = "";
    $passreqerror .= "<div class='alert alert-danger' role='alert'>";
    $passreqerror .= 'Password moet minimaal 8 characters zijn, 1 hoofdletter, 1 kleine letter en 1 nummer bevatten.';
    $passreqerror .= "</div>";

    if ($uppercase = 0) {echo $passreqerror; return;} // Check voor lowercase
    if ($lowercase = 0) {echo $passreqerror; return;} // Check voor uppercase
    if ($number = 0) {echo $passreqerror; return;} // Check voor nummer
    if (strlen($password_1) < 8) {echo $passreqerror; return;} // Check voor lengte

  // Kijk nu of er al iets overeenkomt in de database
    // Maak het lowercase om te kijken of 
    $lowercaseusername = strtolower($username);
    $lowercaseemail = strtolower($email);

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  // $sqlchecktaken = "SELECT `username`, `usermail` FROM user WHERE username='$username' OR usermail='$lowercaseemail' LIMIT 1";
  // $result = mysqli_query($dbConnection, $sqlchecktaken);
  // $user = mysqli_fetch_assoc($result);

  $sql = "SELECT `username`, `usermail` FROM user WHERE username='$username' OR usermail='$lowercaseemail' LIMIT 1";
  $result = mysqli_query($dbConnection, $sql);
  $row = mysqli_fetch_assoc($result);

  // Convert the output to lowercase to compare the outputs 
  $querylowercaseusername = strtolower($row['username']);
  $querylowercaseemail = strtolower($row['usermail']);

        // Check if username is taken
        if ($querylowercaseusername === $lowercaseusername) {
          echo "<div class='alert alert-danger' role='alert'>";
          echo "Deze username bestaat al. Probeer het nog eens met een andere username.";
          echo "</div>";
          // Log the failed existing username
          Customlog("Register", "log", "A user just tried registering with an existing username (Username: $username Mail: $email - School: $school)");
        return;
        }
        // Check if mail is taken
        if ($querylowercaseemail === $lowercaseemail) {
          echo "<div class='alert alert-danger' role='alert'>";
          echo "Deze email is al geregistreerd. Probeer het nog eens met een ander email of log in met de huidige.";
          echo "</div>";
          // Log the failed existing mail
          Customlog("Register", "log", "A user just tried registering with an existing email ($username - $email - With $school)");
        return;
        }

       // If there is no matching user, register it!

    // Check if the query resulted 0 rows, just to be sure. If it does, we are sure that there is no user with the same username and/or

    if (mysqli_num_rows($result) < 1) {
        //register user if there are no errors in the form
        $password = md5($password_1);//encrypt the password before saving in the database. Usefull :)

        $query = "INSERT INTO user (username, usermail, wachtwoord, userrole, schoolnaam, profile_picture) 
                VALUES('$username', '$lowercaseemail', '$password', 'user', '$school','/storage/profilepictures/default.png')";
        mysqli_query($dbConnection, $query);

        Customlog("Register", "log", "New User created! ($username - With $email)");

        //Create a session, The user will be logged in with this after a SUCCESSFULL register attempt
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        //create an emailverification for the user
        sendemailverification($username, $email, "emailverificatie");

        // Inform the user that their registration was successfull. Then redirect them after
        echo "<div class='alert alert-success' role='alert'>";
        echo "Je account is geregistreerd! Je wordt doorgestuurd naar de homepagina.";
        echo "</div>";
        header("Refresh:10; url=login.php");
        return;
    }
        // Inform user
          echo "<div class='alert alert-danger' role='alert'>";
          echo "Er was een error! De administrators zijn op de hoogte gebracht";
          echo "</div>";
        // Log the error
          Customlog("Register", "log", "Someone filled in a form and produced an error that isn't catched?!. If there are any common errors, they have been logged below. ($username, $email, $school)");
          Customlog("Register", "error", "DUMP: mysql:" . mysqli_error($dbConnection) ."|Queryname: $querylowercaseusername Inputname: $lowercaseusername|Querymail: $querylowercaseemail Inputname: $lowercaseemail|  " );
      return;   
}
?>