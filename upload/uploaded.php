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
	
	<?php
		if (isset($_POST['meme'])) {
			$safememe = mysql_real_escape_string($dbconnection, $_POST['meme']);
			$safename = mysql_real_escape_string($dbconnection, $_POST['name'])
		}
	?>
	
    <?php require('form.upload.php'); ?>

  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>