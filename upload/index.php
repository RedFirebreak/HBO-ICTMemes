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
    
    
    <!-- Start coding here! :D -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Upload</h1>
        <p>UploadPage</p>

      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
			<?php require('uploaded.php'); ?>
            <?php require('form.upload.php'); ?>
            </div>
        </div>
    </div>
  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>