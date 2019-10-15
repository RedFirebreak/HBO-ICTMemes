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
    <?php require('form.register.php'); ?>

    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Register here</h1>
        <p>Register with your credentials here, <a href="/login.php">or log in</a>.</p>

      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><a href="login.php">login</a></h2>
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