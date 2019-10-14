<!DOCTYPEhtml>
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
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
    <?php require('form.login.php'); ?>
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Log in</h1>
        <p>Enter your credentials here, <a href="/register.php">or register</a>.</p>

      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h2><a href="register.php">register</a></h2>
            <h2><a href="resetpassword.php">resetpassword</a></h2>
            </div>

            <div class="col-md-6">
                <h2>More Stuff n' Things</h2>
            </div>
        </div>
    </div>
    
  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>