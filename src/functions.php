<?php
  //This file will be used for defining functions for later use :)

    // Error handling for the site. We want everything to be logged :)
    function CustomErrorHandling($errno, $errstr, $errfile, $errline) {
      Customlog("SYSTEM-$errfile", "error", "[Line: $errline][$errno] $errstr");

      // Uncomment this to allow onpage errors again
      //echo "<b>Error:</b> [$errno] $errstr<br>[File: $errfile][Line: $errline]";
    }
    
        /*
        Custom-logging
        Example for the customlog, Pagename: sort and message
            Customlog("Homepage", "log", "Ahh shit here we go again");
        Types allowed:
        - log
        - error
        - critical
        - default (if something is filled in which is not supported)
        */
    function Customlog ($docname, $type, $error) {
      $logcation  = checkpathtosrc();
      $logcation  .= "logs";

      //cause functions are "local". Import db connection and open it:
        //Check database connection:
        $dbConnection = databaseConnect();

        //Check date and time, for logging purposes
            $checkdate = date("j-n-Y");
            $checktime = date("h:i:s");

        // Make the error database-safe
        $safeerror = mysqli_real_escape_string($dbConnection, $error);

        // Log the ip of remote user
        $ip = $_SERVER['REMOTE_ADDR'];

      switch ($type) {
          case "log":
          //This means the error is a normal log message. We should be notified, but nothing really "breaking" is going on here.
          //Format it nicely
            $finalerrormessage = "$checktime | $ip | $docname | LOG: $error \n";

            //Create/Write in file general error file.
              $errorfile = fopen("$logcation/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
              //Create/Write in file of today, fill the file and close it.
                $errorfile = fopen("$logcation/filtered/{$checkdate}_NORMAL.log", "a");
                fwrite($errorfile, $finalerrormessage);
                fclose($errorfile);

                // Database part: Do we need logs in the error database? Or just "logged" in a file
                // $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','LOG','$safeerror')";
                // $dbConnection->query($sql);
            
              break;
          case "error":
          //This is an error, we should probably fix this!
          //Format it nicely
            $finalerrormessage = "$checktime | $ip | $docname | ERROR: $error\n";
            //Create/Write in file general error file.
              $errorfile = fopen("$logcation/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
            //Create/Write in file of today, fill the file and close it.
              $errorfile = fopen("$logcation/filtered/{$checkdate}_ERROR.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);

            // Database part:
                $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','ERROR','$safeerror')";
                $dbConnection->query($sql);

              break;
          case "critical":
          //This is a CRITICAL error, THIS HAS PRIORITY!
          //Format it nicely
          $finalerrormessage = "$checktime | $ip | $docname | CRITICAL: $safeerror\n";

            //Create/Write in file general error file.
              $errorfile = fopen("$logcation/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
            //Create/Write in file of today, fill the file and close it.
              $errorfile = fopen("$logcation/filtered/{$checkdate}_CRITICAL.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);
            // Database part:
                $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','CRITICAL','$safeerror')";
                $dbConnection->query($sql);
            // Send an email to the main email! We need to fix this ASAP
            error_log("$finalerrormessage",1, "error@hbo-ictmemes.nl","From: system@hbo-ictmemes.nl");
              break;
          default:
          //If you need it to be logged somewhere, but you did not properly specify it. This default should catch it
          //Format it nicely
          $finalerrormessage = "$checktime | $ip | $docname | DEFAULT: $safeerror\n";
            //Create/Write in file general error file.
              $errorfile = fopen("$logcation/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
            //Create/Write in file of today, fill the file and close it.
              $errorfile = fopen("$logcation/filtered/{$checkdate}_DEFAULT.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);

            // Database part:
                $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','DEFAULT','$safeerror')";
                $dbConnection->query($sql);
              break;
        
      }
      databaseDisconnect($dbConnection); // disconnect from database
      return;
    }

    function databaseConnect() {
      global $config;
      //connect to database
      $db_conn = mysqli_connect($config['mysql']['hostname'],
                                $config['mysql']['username'],
                                $config['mysql']['password'],
                                $config['mysql']['database']);      
  
      // check connection
      if (mysqli_connect_errno()) {
        //Throw error (Cant save in database, cuz no connection.)
        $errordate = date("j-n-Y"); 
        $errortime = date("h:i:s");
        $docname = basename(__FILE__);
        $errormessage = "$errortime | $docname | FAILED DATABASE CONNECTION: ". mysqli_connect_error() . "\n";

          // Write in the main logging file
            $dbconnectionerrorfile = fopen("src/logs/{$errordate}_AllLogs.log", "a");
            fwrite($dbconnectionerrorfile, $errormessage);
            fclose($dbconnectionerrorfile);

          // Write seperate file
            $dbconnectionerrorfile = fopen("src/logs/filtered/{$errordate}_db-fail.log", "a");
            fwrite($dbconnectionerrorfile, $errormessage);
            fclose($dbconnectionerrorfile);

          // Inform the user of the error
          echo "<h1>Yikes! It looks like the database connection failed.<br>";
          echo "<p>The admins have been notified of this error. Please come back later!</p>";
          echo "<br>";
        exit();
        }
    
    //echo "connected";			
    return $db_conn;
    }

  function databaseDisconnect($db_conn) {
    mysqli_close($db_conn);
  }

  function randomNumber($length) {
    $result = '';
    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }
    return $result;
}
  function checkpathtosrc () {
      //Check if the function is called from the existing directories
      $Searchin = getcwd();

      if( strpos( $Searchin, 'hbo-ictmemes.nl' ) !== false) {
        $subdirectoryaccount = "/account";
        $subdirectoryadmin = "/admin";
        $subdirectorymeme = "/meme";
        $subdirectorysrc = "/src";
        $subdirectoryupload = "/upload";
        $subdirectoryverify = "/verify";
      } else {
        $subdirectoryaccount = "account";
        $subdirectoryadmin = "admin";
        $subdirectorymeme = "meme";
        $subdirectorysrc = "src";
        $subdirectoryupload = "upload";
        $subdirectoryverify = "verify";
      }
      
      $logcation = 'src/';
      if( strpos( $Searchin, $subdirectoryaccount ) !== false) {$logcation = "../src/";}
      if( strpos( $Searchin, $subdirectoryadmin ) !== false) {$logcation = "../src/";}
      if( strpos( $Searchin, $subdirectorymeme ) !== false) {$logcation = "../src/";}
      if( strpos( $Searchin, $subdirectorysrc ) !== false) {$logcation = "../src/";}
      if( strpos( $Searchin, $subdirectoryupload ) !== false) {$logcation = "../src/";}
      if( strpos( $Searchin, $subdirectoryverify ) !== false) {$logcation = "../src/";}
      return $logcation;
  }

  function sendemailverification($username, $email, $soort) {
    Customlog("SendEmail", "log", "sendemailverification($soort) has been called. ($username - With $email)");
    //cause functions are "local". Import db connection and open it:
      //Check database connection:
        $dbConnection = databaseConnect();

    // Clean the input (can never be too sure)
    $safeusername = mysqli_real_escape_string($dbConnection, $username);
    $safeemail = mysqli_real_escape_string($dbConnection, $email);
    $safesoort = mysqli_real_escape_string($dbConnection, $soort);

    //setup query
    $query = "SELECT `USER-ID` FROM user WHERE username='$safeusername' AND usermail='$safeemail'";
    //setup results
    $results = mysqli_query($dbConnection, $query);
    //setup rows
    $row = mysqli_fetch_assoc($results);

    //If all matches, we should now have a userID
    $userid = $row['USER-ID'];

    //Check if there's actually an ID
    if (!$userid) {
      // If no ID popped up, something went terribly wrong and the user should be notified
      // Inform user that something went wrong
        echo "<div class='alert alert-danger' role='alert'>";
        echo "De email-verificatie kon je account helaas niet vinden. De administrators zijn op de hoogte van dit probleem.";
        echo "</div>";
      //Log the attempt, this is a critical event since no email-verification has been sent and the account will be useless.
      Customlog("SendEmail", "critical", "sendemailverification failed to find the users ID. No email has been sent!! ($username - With $email)");
      return;
    }

    // Create a random string of 8 numbers
    $verificationcode = randomNumber(8);

    // Save the emailverification-code
      $query = "INSERT INTO emailverificatie (`user-ID`, verificatiecode, soort ) 
      VALUES('$userid', '$verificationcode', '$safesoort')";
      mysqli_query($dbConnection, $query);
      
    // Prepare the rest for the email, Make link
      // Als dit een emailverificatie is
      $subject = "";
      if ($safesoort == "emailverificatie") {
        $sitename = "https://www.hbo-ictmemes.nl/verify/?emailverificatie=true&username=$safeusername&mail=$safeemail&code=$verificationcode";
        $checkpath = checkpathtosrc();
        // Import the mail-template
          require("{$checkpath}templates/ConfirmEmailTemplate.php");
        // Set the subject
          $subject = "HBO-ICTMemes - Email verificatie";
        }
      // Als dit een wachtwoordreset is
      if ($safesoort == "wachtwoordreset") {
        $sitename = "https://www.hbo-ictmemes.nl/verify/?wachtwoordreset=true&username=$safeusername&mail=$safeemail&code=$verificationcode";
        $checkpath = checkpathtosrc();
        // Import the mail-template
          require("{$checkpath}templates/PasswordResetTemplate.php");
        // Set the subject
          $subject = "HBO-ICTMemes - Wachtwoord Reset";
        }

    // Prepare header
      $headers = "From: system@hbo-ictmemes.nl \r\n";
      $headers .= "Reply-To: system@hbo-ictmemes.nl \r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

      if (isset($mail)) {
        // Send mail
          $mailresult = mail($safeemail, $subject, $mail, $headers);
          
          if ($mailresult = 1) {
            echo "<div class='alert alert-warning' role='alert'>";
            echo "Nieuwe email-verificatie verzonden! Volg de instructies op in de mail. Deze is 24 uur geldig.";
            echo "</div>";
            // We done!
            databaseDisconnect($dbConnection); // disconnect from database
            return;
          } elseif($mailresult = 0) {
            Customlog("SendEmail", "critical", "De email kon niet verstuurd worden, check of de mailserver het nog doet!($safeusername, $safeemail)");
            echo "<div class='alert alert-warning' role='alert'>";
            echo "De email kon niet verzonden worden. De administrators zijn op de hoogte gebracht.";
            echo "</div>";
            // We done!
            databaseDisconnect($dbConnection); // disconnect from database
            return;
          }

      } else {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "De email-verificatie aanvraag kon niet verwerkt worden. De administrators zijn op de hoogte van dit probleem.";
        echo "</div>";
      }
      // If something fails, catch it. Log it and close the function. The mail should be sent by now!
      //Log the attempt, this is a critical event since no email-verification has been sent and the account will be useless.
        Customlog("SendEmail", "error", "sendemailverification heeft de mail-template niet kunnen versturen ($soort)!! ($username - With $email)");
      //
      databaseDisconnect($dbConnection); // disconnect from database
    return;
    }

    function recaptchaform () {
      // Get key from config
      $config  = checkpathtosrc();
      $config .= "config.php";
      require "$config";
      $key = $config['recaptchakey'];

      $recaptchadiv = "<div class='g-recaptcha' data-sitekey='$key'></div>";

      return $recaptchadiv;
    }
  
    function recaptchaverwerk ($captcha) {
      // Get secret key from config
      $config  = checkpathtosrc();
      $config .= "config.php";
      require "$config";

      //check if captcha was filled
      if(!$captcha){
        return false;
      }
      $secretKey = $config['recaptchakeysecret'];
      $ip = $_SERVER['REMOTE_ADDR'];
      // post request to server
      $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
      $response = file_get_contents($url);
      $responseKeys = json_decode($response,true);
      
      // should return JSON with success as true
      if($responseKeys["success"]) {
              return true;
      } else {
              // decode the error
              $cwd = getcwd();
              $ip = $_SERVER['REMOTE_ADDR'];
              $captchaerror = "";
              foreach($responseKeys["error-codes"] as $result) {
                $captchaerror .= "$result, ";
              }
              Customlog("captcha-{$cwd}", "log", "Someone failed at a captcha - $captchaerror");
              return false;
      }
// the actual checking of the mail
    }

    // Check for needles in a haystack (search in array function), returns a boolean
    // Example 1: echo in_array_any( [3,9], [5,8,3,1,2] ); // true, since 3 is present
    // Example 2: echo in_array_any( [4,9], [5,8,3,1,2] ); // false, neither 4 nor 9 is present
    function in_array_any($needles, $haystack) {
      return !empty(array_intersect($needles, $haystack));
   }
?>