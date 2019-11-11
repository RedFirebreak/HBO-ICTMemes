<?php
      // Check for config
      require "../src/config.php";

      // Include all important functions
      require "../src/functions.php";

      //Check database connection:
      $dbConnection = databaseConnect();

      //Set errors in the database and errorfile
      set_error_handler("CustomErrorHandling");

      if (!isset($_SESSION['loggedin'])) {
        $_SESSION['loggedin'] = false;
      }


      if ($_SESSION['loggedin'] == true) {
        //Set variables
        $Loggedin = $_SESSION['loggedin'];
        $LoggedinID = $_SESSION['userid'];
        $LoggedinUsermail = $_SESSION['usermail'];
        $LoggedinUsername = $_SESSION['username'];
        $LoggedinUserrole = $_SESSION['userrole'];
        $LoggedinVerified = $_SESSION['is_verified'];
        $LoggedinGebanned = $_SESSION['banned'];
      } else {
        $_SESSION['notice'] = "You are not logged in";
        $Loggedin = false;
        $LoggedinID = "";
        $LoggedinUsermail = "";
        $LoggedinUsername = "";
        $LoggedinUserrole = "";
        $LoggedinVerified = "";
        $LoggedinGebanned = "";
      }

      // To logout from any location
      if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['userid']);
        unset($_SESSION['usermail']);
        unset($_SESSION['username']);
        unset($_SESSION['userrole']);
        unset($_SESSION['is_verified']);
        unset($_SESSION['banned']);
        
        header('Refresh: 0; url=/');
      }
    ?>