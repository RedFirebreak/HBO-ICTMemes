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
    <title>HBO-Memes - PAGENAME</title>
    <?php require('../func.header.php'); ?>
  </head>

  <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <?php 
            // Als "href="?emailverificatie='1' gezet is, wordt dit uitgevoerd.
            // Emailverificatie
            if (isset($_GET['emailverificatie'])) {
              require('func.emailverificatie.php');
            }
          ?>

          <!-- OF de ander -->

          <?php 
            // Als "href="?resetpassword='1' gezet is, wordt dit uitgevoerd.
            // ResetPassword
            if (isset($_GET['resetpassword'])) {
              require('form.resetpassword.php');
            }
          ?>
        </div>
      </div>
    </div>
  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>