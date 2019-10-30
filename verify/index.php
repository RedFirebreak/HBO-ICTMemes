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
    <?php require('/func.header.php'); ?>
  </head>

  <body>

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

  </body>

  <footer>
    <?php require('/func.footer.php'); ?>
  </footer>
</html>