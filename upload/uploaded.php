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
    <!-- Start coding here! :D -->
	
	<?php
		echo "<br>";
		//is er wel een user ingelogd?
		//if ($loggedin) {
			// First check if recaptcha was valid
			  if(isset($_POST['g-recaptcha-response'])){
				$captcha=$_POST['g-recaptcha-response'];
				$recaptcha = recaptchaverwerk($captcha);
			  } else {
				// Well, captcha wasn't entered so the form wasn't touched. Stop the rest!
				return;
			  }
				if (!$recaptcha){
				  echo "<div class='alert alert-danger' role='alert'>";
				  echo "Recaptcha is niet ingevuld, niet correct of is verlopen. Probeer het nog eens.";
				  echo "</div>";
				  return;
				}
			//captcha check done!
			//check of alle data er is
			if (!empty($_FILES['meme']) && isset($_FILES['meme']) && !empty($_POST['name'])&& isset($_POST['name']) && isset($_POST['tags'])) {
				
				//data schoonmaken
					$safename = mysqli_real_escape_string($dbConnection, $_POST['name']);
				
				//school achterhalen
					$sql = "Select schoolnaam from user where `user-ID`='5';"; //. $LoggedinID;
					$result = $dbConnection->query($sql);
					$school = mysqli_fetch_assoc($result)['schoolnaam'];
				var_dump ($school);
				
				//query(s) maken
					$sql = "INSERT INTO meme (`meme-titel`, `user-ID`, `locatie`, `school`) Values 
					('" . $safename . "', '12', '/storage/meme/".date("Y")."/".date("n")."', '". $school ."');";
					$result = $dbConnection->query($sql);
					echo "<br>";
					var_dump($result);
					//tags nog weer apart
						//meme-ID achterhalen
							$sql = "Select `meme-ID` from meme where `meme-titel`='" . $safename . "';";
							$result = $dbConnection->query($sql);
							$memeID = mysqli_fetch_assoc($result);
						
						//tags inserten
						$query = "select `tag-ID`, tagnaam from tags order by 1";
						$result = $dbConnection->query($query);
						$sql = "";
						while ($record = $result->fetch_assoc())
						{
							if (in_array($record['tagnaam'], $_POST['tags'])){
								$sql .= "INSERT INTO memetag (`meme-ID`, `tag-ID`)
								Values ('".$memeID['meme-ID']."', '".$record['tag-ID']."');";
							}
						}
						$result = $dbConnection->query($sql);
						echo "<br>";
						var_dump($sql);
						echo "<br>";
						var_dump($result);
						echo "<br>";
					
				//check query
					if (!$result) {
						customlog("uploaded", "error", "An upload form couldn't be sent: the query failed.");
						
						echo "<div class='alert alert-danger' role='alert'>
						Er was een probleem bij het versturen van de meme. Probeer het later nog eens.
						</div>";
					} else {
						echo "<div class='alert alert-success' role='alert'>
						Dank je! Je meme is geupload3! </div>";
					}
						var_dump($_FILES['meme']);
				//meme uploaden
					$target_dir = "../storage/meme/".date("Y")."/".date("n")."/";
					$target_file = $target_dir . basename($_FILES["meme"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					// Check if image file is an actual image or fake image
						$check = getimagesize($_FILES["meme"]["tmp_name"]);
						if($check !== false) {
							echo "File is een afbeelding - " . $check["mime"] . ".";
							$uploadOk = 1;
						} else {
							echo "File is geen afbeelding.";
							$uploadOk = 0;
						}
					// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, je meme bestaat al.";
							$uploadOk = 0;
						}
					// Check file size
						if ($_FILES["meme"]["size"] > 2000000) {
							echo "Sorry, je file is te groot.";
							$uploadOk = 0;
						}
					// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, alleen JPG, JPEG, PNG & GIF files zijn toegestaan.";
							$uploadOk = 0;
						}
					// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, je meme was niet geupload.";
					// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["meme"]["tmp_name"], $target_file)) {
								echo "Je meme is geupload";
							} else {
								echo "Er was een probleem bij het uploaden van de meme.";
							}
						}
			}
			//check welke data er mist
			else {
				$datamis = "";
				
				if (empty($_FILES['meme'])) {
					echo "<div class='alert alert-danger' role='alert'>";
					echo "Er is geen meme geselecteerd. Probeer het nog eens.";
					echo "</div>";
					return;
				}
				if (empty($_POST['name'])) {
					echo "<div class='alert alert-danger' role='alert'>";
					echo "Er is geen naam ingevuld. Probeer het nog eens.";
					echo "</div>";
					return;
				}
				if (!isset($_POST['tags'])) {
					echo "<div class='alert alert-danger' role='alert'>";
					echo "Er zijn geen tags geselecteerd. Probeer het nog eens.";
					echo "</div>";
					return;
				}
			}
			echo "<br><br>";
			//var_dump($_FILES['meme']);
		/*}
		else {
			echo "<div class='alert alert-danger' role='alert'>";
			echo "Je moet ingelogd zijn voordat je memes kan uploaden.";
			echo "</div>";
		}*/
	?>
