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
		if (isset($_FILES['meme'])) {
			echo "klaar";
			//data schoonmaken
				$safememe = mysqli_real_escape_string($dbconnection, $_FILES['meme']);
				$safename = mysqli_real_escape_string($dbconnection, $_POST['name']);
			
			//school achterhalen
				$sql = "Select schoolnaam from user where 'user-ID'=" . $loggedinID;
				$result = $dbConnection->query($sql);
				$school = mysqli_fetch_assoc($result);
			
			//query(s) maken
				$sql = "INSERT INTO 'meme' ('meme-titel', 'user-ID', 'locatie', 'school')
				Values (" . $safename . ", " . $loggedinID . ", '/memestorage/".date(Y)."/".date(n)."', " . $school['schoolnaam'] . ");";
				$result = $dbConnection->query($sql);
				
				//tags nog weer apart
					//meme-ID achterhalen
						$sql = "Select 'meme-ID' from memetag where 'meme-titel'=" . $safename;
						$result = $dbConnection->query($sql);
						$memeID = mysqli_fetch_assoc($result);
					
					//tags inserten
					$query = "select tagnaam from tags order by 1";
					$result = $dbConnection->query($query);
					while ($record = mysqli_fetch_assoc($result))
					{
						if (in_array($record['tagnaam'], $_POST['tags'])){
							$sql .= "INSERT INTO 'memetag' ('meme-ID', 'tag-ID')
							Values (".$memeID.", ".$record['tagnaam'].");";
						}
					}
					
				
			//check query
				if (!$result) {
					customlog("uploaded", "error", "An upload form couldn't be sent: the query failed.");
					
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