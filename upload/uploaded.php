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
			//data schoonmaken
			$safememe = mysql_real_escape_string($dbconnection, $_POST['meme']);
			$safename = mysql_real_escape_string($dbconnection, $_POST['name']);
			
			//query maken
			$sql = "INSERT INTO 'meme' ('meme-titel', 'user-ID', 'tag-ID', 'locatie', 'school')
			Values ('$safename', '$loggedinID', '', '', '');";
			$result = $dbConnection->query($sql);
			
			//check query
			if (!$result) {
				customlog("uploaded", "error", "An upload form couldn't ben sent: the query failed.");
				
				echo "<div class='alert alert-danger' role='alert'>
				A problem occured while sending the meme. Please try again later
				</div>";
			} else {
				echo "<div class='alert alert-success' role='alert'>
				Thank you! Your meme has been uploaded! </div>";
				
			}
		}
	?>
	
    <?php require('form.upload.php'); ?>

  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>