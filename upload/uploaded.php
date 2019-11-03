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
	<?php require('form.upload.php'); ?>
	
	<?php
		echo "<br>";
		//check of alle data er is
		if (isset($_FILES['meme']) && isset($_POST['name']) && isset($_POST['tags'])) {
			
			//data schoonmaken
				//$safememe = mysqli_real_escape_string($dbConnection, $_FILES['meme']);
				$safename = mysqli_real_escape_string($dbConnection, $_POST['name']);
			
			//school achterhalen
				$sql = "Select schoolnaam from user where `user-ID`=5 order by 1"; //. $LoggedinID;
				$result = $dbConnection->query($sql);
				$school = mysqli_fetch_assoc($result);
			
			//query(s) maken
				$sql = "INSERT INTO 'meme' ('meme-titel', 'user-ID', 'locatie', 'school') Values 
				(" . $safename . ", " . $LoggedinID . ", '/memestorage/".date("Y")."/".date("n")."', " . $school['schoolnaam'] . ");";
				$result = $dbConnection->query($sql);
				
				//tags nog weer apart
					//meme-ID achterhalen
						$sql = "Select `meme-ID` from meme where `meme-titel`='Memey-boi1'";// . $safename;
						$result = $dbConnection->query($sql);
						$memeID = mysqli_fetch_assoc($result);
					
					//tags inserten
					$query = "select tagnaam from tags order by 1";
					$result = $dbConnection->query($query);
					while ($record = $result->fetch_assoc())
					{
						if (in_array($record['tagnaam'], $_POST['tags'])){
							$sql .= "INSERT INTO 'memetag' ('meme-ID', 'tag-ID')
							Values (".$memeID['meme-ID'].", ".$record['tagnaam'].");";
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
			
			//meme uploaden
				$target_dir = "HBO-ICTmemes/memestorage/".date("Y")."/".date("n")."/";
				$target_file = $target_dir . basename($_FILES["meme"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is an actual image or fake image
					if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["meme"]);
						if($check !== false) {
							echo "File is an image - " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							echo "File is not an image.";
							$uploadOk = 0;
						}
					}
				// Check if file already exists
					if (file_exists($target_file)) {
						echo "Sorry, file already exists.";
						$uploadOk = 0;
					}
				// Check file size
					if ($_FILES["meme"]["size"] > 500000) {
						echo "Sorry, your file is too large.";
						$uploadOk = 0;
					}
				// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
					}
				// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["meme"], $target_file)) {
							echo "The file ". basename( $_FILES["meme"]["name"]). " has been uploaded.";
						} else {
							echo "Sorry, there was an error uploading your file.";
						}
					}
		}
		//check welke data er mist
		else {
			$datamis = "";
			
			if (!isset($_FILES['meme'])) {
				$datamis .= "You must choose a meme to upload. <br>";
			}
			if (!isset($_POST['name'])) {
				$datamis .= "You must choose a name for your meme. <br>";
			}
			if (!isset($_POST['tags'])) {
				$datamis .= "You must choose at least one tag. <br>";
			}
			if (isset($_POST['submit'])) {
				echo $datamis;
			}
		}
	?>
	

  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>