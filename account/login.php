<!DOCTYPEhtml>
    <?php
    /*
        [DESCRIPTION]
        This file does logging in and stuff
        // https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database 

        [INFO]
        Author:     Stef
        Date:       29-10-2019
    */
?>

    <html>

    <head>
        <!-- Edit the pagename only -->
        <title>HBO-Memes - INSERT MEMETITLE</title>
        <?php require('../func.header.php'); ?>
    </head>

    <body>

        <!-- Start coding here! :D -->

        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Log in</h1>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Voer hier je login-gegevens in</h2><br>

                    <?php
                if ($Loggedin) {
                  echo "<div class='alert alert-success' role='alert'>";
                  echo "Het lijkt erop dat je al ingelogd bent! Niet jou account? Of wil je opnieuw inloggen? <a style='color: red;' href='?logout=1'>Log-uit</a>";
                  echo "</div>";
                } else {
                  // Als er een verification wordt aangevraagd, wordt die verzonden op deze manier
                  if (isset($_GET['sendverification'])){
                    $username = mysqli_real_escape_string($dbConnection, $_GET['username']);
                    $email = mysqli_real_escape_string($dbConnection, $_GET['email']);

                    sendemailverification($username, $email, "emailverificatie");
                  }
                  require('func.login.php'); 
                  require('form.login.php'); 
                }
              ?>

                </div>

                <div class="col-md-6">

                    <h2><a href="resetpassword.php">resetpassword</a></h2>
                </div>


            </div>
        </div>

    </body>

    <footer>
        <?php require('../func.footer.php'); ?>
    </footer>

    </html>