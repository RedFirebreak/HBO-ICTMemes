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
		if ($LoggedinID) {
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
					$safetag = mysqli_real_escape_string($dbConnection, $_POST['tags']);
					$school = mysqli_real_escape_string($dbConnection, $_POST['school']);

					// Kijk of er met "school" geknoeid is
						if (!$school == $LoggedinSchool OR !$school == 'geen') {
							// Check of de user voor zijn eigen school wil uploaden of voor de "geen" school. Als dat niet zo is, stop hier al.
							echo "<div class='alert alert-danger' role='alert'>";
							echo "Je mag niet voor een andere school uploaden";
							echo "</div>";
							return;
						}

						//meme uploaden
						$target_dir = "../storage/meme/".date("Y")."/".date("n")."/";
						$sql_dir = "/storage/meme/".date("Y")."/".date("n")."/";

						//Predict ID and Rename the file
							// Get the latest ID. Do ++ and name the image that.
							$sql = "SELECT `meme-id` FROM meme ORDER BY datum DESC LIMIT 1";
							$result = mysqli_query($dbConnection, $sql);
							$row = mysqli_fetch_assoc($result);
							$memeID = $row['meme-id'];
							$memeID++; 

						$target_file = $target_dir ."ID{$memeID}_". basename($_FILES["meme"]["name"]);
						$sql_file = $sql_dir ."ID{$memeID}_". basename($_FILES["meme"]["name"]); 

						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

						// Check if image file is an actual image or fake image
							$check = getimagesize($_FILES["meme"]["tmp_name"]);
							if($check !== false) {
								$uploadOk = 1;
							} else {
								echo "<div class='alert alert-danger' role='alert'>
									 Er was een fout bij het uploaden van de meme. Probeer het later nog eens.
									 </div><br>";
								$uploadOk = 0;
							}
						/* Check if file already exists
							if (file_exists($target_file)) {
								echo "<div class='alert alert-danger' role='alert'>
								Je meme bestaat al.</div><br>";
								$uploadOk = 0;
							}
						*/
						// Check file size
							if ($_FILES["meme"]["size"] > 2000000) {
								echo "<div class='alert alert-danger' role='alert'>
								Je meme is te groot.</div><br>";
								$uploadOk = 0;
							}
						// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
							&& $imageFileType != "gif" ) {
								echo "<div class='alert alert-danger' role='alert'>
								Alleen JPG, JPEG, PNG & GIF files zijn toegestaan.</div><br>";
								$uploadOk = 0;
							}
						// Check if $uploadOk is set to 0 by an error
							if ($uploadOk == 0) {
								echo "<div class='alert alert-danger' role='alert'>
								Sorry, je meme was niet geupload.</div>";
						// if everything is ok, try to upload file
							} else {
								if (!move_uploaded_file($_FILES["meme"]["tmp_name"], $target_dir . "ID{$memeID}_". basename($_FILES["meme"]["name"]))) {
									echo "<div class='alert alert-danger' role='alert'>
									Er was een probleem bij het uploaden van de meme.</div>";
								} else {
				//~~~~~~~~~~~~~~~~hier wordt de sql gedaan.~~~~~~~~~~~~~~~~~~
									
									//query(s) maken
										$sql = "INSERT INTO meme (`meme-titel`, `user-ID`, `locatie`, `school`) Values 
										('$safename', '$LoggedinID', '$sql_file', '$school');";
										$memeins = $dbConnection->query($sql);

									//tags inserten
										$sql5 = "INSERT INTO `memetag`(`tag-ID`, `meme-ID`) VALUES ('$safetag', '$memeID')";
										$inserttag = mysqli_query($dbConnection, $sql5);
									//check query
									if (!$result) {
										customlog("uploaded", "error", "the result query check failed.");
										echo "<div class='alert alert-danger' role='alert'>
										Er was een probleem bij het versturen van de meme. Je accountaanvraag kon niet verwerkt worden Probeer het later nog eens.
										</div>";

									}
									if (!$memeins) {
										customlog("uploaded", "error", "the inserting meme row query failed.");
										echo "<div class='alert alert-danger' role='alert'>
										Er was een probleem bij het versturen van de meme. Probeer het later nog eens.
										</div>";
									}
									if (!$inserttag) {
										customlog("uploaded", "error", "Tags query failed the query failed.");
											
										echo "<div class='alert alert-danger' role='alert'>
										Er was een probleem bij het versturen van de meme. Tags konden niet toegevoegd worden aan je meme. Probeer het later nog eens.
										</div>";
									} else {
										echo "<div class='alert alert-success' role='alert'>
										Dank je! Je meme is geupload. Je wordt doorgestuurd naar je meme.
										</div>";
										header("Refresh: 3; URL=/meme/?id=$memeID");
									}
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
		}
		else {
			echo "<div class='alert alert-danger' role='alert'>";
			echo "Je moet ingelogd zijn voordat je memes kan uploaden.";
			echo "</div>";
		}
	?>
