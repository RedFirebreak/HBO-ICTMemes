<?php
      // Initialise composer
      require ('vendor/autoload.php');

      // Check for config
      require "src/config.php";

      // Include all important functions
      require "src/functions.php";

      //Check database connection:
      $dbConnection = databaseConnect();

      //Set errors in the database and errorfile
      set_error_handler("CustomErrorHandling");

      session_start(); 

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
        $LoggedinSchool = $_SESSION['schoolnaam'];

        $discordloggedin = $_SESSION['discordloggedin'];
        $discordadminallowed =  $_SESSION['discordallowed'];
        $discordname = $_SESSION['discordname'];
        // Exists, but not set due to security: $_SESSION['discordtoken'];
      } else {
        $_SESSION['notice'] = "You are not logged in";
        $Loggedin = false;
        $LoggedinID = "";
        $LoggedinUsermail = "";
        $LoggedinUsername = "";
        $LoggedinUserrole = "";
        $LoggedinVerified = "";
        $LoggedinGebanned = "";
        $LoggedinSchool = "";
        $discordloggedin = "";
        $discordadminallowed =  "";
        $discordname = "";
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
        unset($_SESSION['schoolnaam']);
        unset($_SESSION['discordloggedin']);
        unset($_SESSION['discordallowed']);
        unset($_SESSION['discordname']);
        unset($_SESSION['discordtoken']);

        header('Refresh: 0; url=/');
      }
    ?>
<html lang="en" class="no-js">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">

<!-- Jquery -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<!-- lazy loading possibilities -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyloadxt/1.0.0/jquery.lazyloadxt.min.js"></script>

<!-- Bootstrap core CSS -->
<link href="/src/css/bootstrap.min.css" rel="stylesheet">

<!-- Recaptcha -->
<script src='https://www.google.com/recaptcha/api.js' async defer></script>

<!-- Custom styles for this template -->
<link href="/src/css/jumbotron.css" rel="stylesheet">

<!-- Our custom css -->
<link href="/src/css/stylesheet.css" rel="stylesheet">

<!-- Fontawesome! -->
<script src="https://kit.fontawesome.com/03fd3b0aa1.js" crossorigin="anonymous"></script>

<!-- NewMenu -->
<link rel="stylesheet" href="/src/css/menu.css"> <!-- Resource style -->
<script src="/src/js/modernizr.js"></script> <!-- Modernizr -->

<header id="navbar">
    <div class="cd-logo"><a href="/"><img src="/src/img/cd-logo.svg" alt="Logo"></a></div>
    <?php
          if ($Loggedin) {
            // Show the menu for logged in people
                echo "<nav class='cd-main-nav-wrapper'>";
                echo "<ul class='cd-main-nav'>";
                  echo "<li><a href='/'>Homepage</a></li>";
                  echo "<li><a href='/upload/'>Upload</a></li>";
                  echo "<li><a href='/tags.php'>Tags</a></li>";

                    echo "<li><form action='/search.php' method='post'><input style='font-size: 1.1em;' name='search' class='searchbar' type='search' placeholder='Search' aria-label='Search'></li>";
                    echo "<li><button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button></li></form>";

                    echo "<li>";
                    echo "<a href='#0' class='cd-subnav-trigger'><span>Account</span></a>";
                    echo "<ul>";
                  echo "<li class='go-back'><a href='#0'>Menu</a></li>";

                  echo "<li><a href='/account/'>Account</a></li>";
                  echo "<li><a href='/upload/'>Upload</a></li>";
                  echo "<li><a href='/support.php'>Support</a></li>";
                  
                  if ($LoggedinUserrole == "admin") {
                    echo "<li><a href='/admin/'>Admin</a></li>";
                  }

                  if ($LoggedinUserrole == "uber-admin") {
                    echo "<li><a href='/admin/'>Admin</a></li>";
                  }                  
                    
                  echo "<li><a style='color: red;' href='?logout=1'>Log-uit</a></li>";
                  echo "<li><a href='#'  class='placeholder'>Placeholder</a></li>";
                echo "</ul>";
                echo "</li>";
                echo "</ul> <!-- .cd-main-nav -->";
                echo "</nav> <!-- .cd-main-nav-wrapper -->";
            
                echo "<a href='#0' class='cd-nav-trigger'><span></span></a>";
          } // End menu for logged in people 
          else {
            // Show menu for not-logged in people
            echo "<nav class='cd-main-nav-wrapper'>";
            echo "<ul class='cd-main-nav'>";
              echo "<li><a href='/'>Homepage</a></li>";

              echo "<li><form action='/search.php' method='post'><input style='font-size: 1.1em;' name='search' class='searchbar' type='search' placeholder='Search' aria-label='Search'></li>";
              echo "<li><button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button></li></form>";

                echo "<li>";
                echo "<a href='#0' class='cd-subnav-trigger'><span>Account</span></a>";
                echo "<ul>";
              echo "<li class='go-back'><a href='#0'>Menu</a></li>";
              echo "<li><a href='/account/login.php'>Log-in</a></li>";
              echo "<li><a href='/account/register.php'>Registreren</a></li>";
              echo "<li><a href='/support.php'>Support</a></li>";
              echo "<li><a href='#'  class='placeholder'>Placeholder</a></li>";
            echo "</ul>";
            echo "</li>";
            echo "</ul> <!-- .cd-main-nav -->";
            echo "</nav> <!-- .cd-main-nav-wrapper -->";
        
            echo "<a href='#0' class='cd-nav-trigger'><span></span></a>";
          }
          ?>

</header>
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-70px";
    }
    prevScrollpos = currentScrollPos;
}
</script>
<!-- main content starts here -->
<main class="cd-main-content">