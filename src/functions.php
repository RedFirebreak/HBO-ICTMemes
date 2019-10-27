<?php
  //This file will be used for defining functions for later use :)

    
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

      //cause functions are "local". Import db connection and open it:
        //Check database connection:
        $dbConnection = databaseConnect();

        //Check date and time, for logging purposes
            $checkdate = date("j-n-Y");
            $checktime = date("h:i:s");

        // Make the error database-safe
        $safeerror = mysqli_real_escape_string($dbConnection, $error);


      switch ($type) {
          case "log":
          //This means the error is a normal log message. We should be notified, but nothing really "breaking" is going on here.
          //Format it nicely
            $finalerrormessage = "$checktime | $docname | LOG: $error \n";

              //Create/Write in file general error file.
               $errorfile = fopen("src/logs/{$checkdate}_AllLogs.log", "a");
               fwrite($errorfile, $finalerrormessage);
               fclose($errorfile);  
              //Create/Write in file of today, fill the file and close it.
                $errorfile = fopen("src/logs/filtered/{$checkdate}_NORMAL.log", "a");
                fwrite($errorfile, $finalerrormessage);
                fclose($errorfile);

                // Database part: Do we need logs in the error database? Or just "logged" in a file
                // $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','LOG','$safeerror')";
                // $dbConnection->query($sql);
            
              break;
          case "error":
          //This is an error, we should probably fix this!
          //Format it nicely
          $finalerrormessage = "$checktime | $docname | ERROR: $error\n";
           
              //Create/Write in file general error file.
              $errorfile = fopen("src/logs/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
             //Create/Write in file of today, fill the file and close it.
               $errorfile = fopen("src/logs/filtered/{$checkdate}_ERROR.log", "a");
               fwrite($errorfile, $finalerrormessage);
               fclose($errorfile);

            // Database part:
                $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','ERROR','$safeerror')";
                $dbConnection->query($sql);

              break;
          case "critical":
          //This is a CRITICAL error, THIS HAS PRIORITY!
          //Format it nicely
          $finalerrormessage = "$checktime | $docname | CRITICAL: $safeerror\n";

            //Create/Write in file general error file.
              $errorfile = fopen("src/logs/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
            //Create/Write in file of today, fill the file and close it.
               $errorfile = fopen("src/logs/filtered/{$checkdate}_CRITICAL.log", "a");
               fwrite($errorfile, $finalerrormessage);
               fclose($errorfile);
               
            // Database part:
                $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','CRITICAL','$safeerror')";
                $dbConnection->query($sql);

              break;
          default:
          //If you need it to be logged somewhere, but you did not properly specify it. This default should catch it
          //Format it nicely
          $finalerrormessage = "$checktime | $docname | DEFAULT: $safeerror\n";

              //Create/Write in file general error file.
              $errorfile = fopen("src/logs/{$checkdate}_AllLogs.log", "a");
              fwrite($errorfile, $finalerrormessage);
              fclose($errorfile);  
             //Create/Write in file of today, fill the file and close it.
               $errorfile = fopen("src/logs/filtered/{$checkdate}_DEFAULT.log", "a");
               fwrite($errorfile, $finalerrormessage);
               fclose($errorfile);

            // Database part:
                $sql = "INSERT INTO `error`(`locatie`, `soort`, `bericht`) VALUES ('$docname','DEFAULT','$safeerror')";
                $dbConnection->query($sql);
              break;
        
      }
      return;
    }
?>
