<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */
	
if (!empty($_POST['changeprofpic'])){
	$password = $_POST["password"];
	$passwordencrypted = md5($password);
	
	$sqlPW = "SELECT wachtwoord from user WHERE `user-id` = '$LoggedinID'";
	
	if ($Loggedin){
		$result_password = mysqli_query($dbConnection,$sqlPW);
		$row = mysqli_fetch_assoc($result_password);
		$dbpassword = $row['wachtwoord'];
		
		if ($passwordencrypted != $dbpassword) {
			$temperror = "Het ingevulde wachtwoord is niet correct, vul deze opnieuw in";
		}
		
		else{
			//checks if the files are filled in, doesn't run otherwise
			if (!empty($_FILES['profilepic']) && isset($_FILES['profilepic'])) {
			
			//defines the place and path of the picture	
				$target_dir = "../storage/profilepictures/$LoggedinID.png";
				//$target_file = $target_dir . $LoggedinID);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_dir,PATHINFO_EXTENSION);
				$pfpicname = "{$LoggedinID}.png";

			// Check if there is already a file. If so, delete it.
			if (file_exists($target_dir)) {
				unlink($target_dir);
			}
			
			//sets picture in database	
				move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_dir);
				$setprofpic = "UPDATE user SET `profile_picture` = '/storage/profilepictures/$pfpicname' WHERE `user-ID` = $LoggedinID";
				$result2 = mysqli_query($dbConnection, $setprofpic);
		
			//if success, run temporary success	message
				if($result2 != false) {
				$tempsucces = "Profile picture has been changed";
				$uploadOk = 1;
				}
				
			//if failed, run temporary error message	
				else {
					$temperror = "File is not an image.";
					$uploadOk = 0;
				}
			}
		}
	}
}

?>

<!-- Start coding here! :D -->
<form action="/account/" method="post" enctype="multipart/form-data">
    Selecteer hier je profielfoto (max. grootte is 2 MB):
    <input type="file" name="profilepic" id="profpic" value="choose a file"><br>
    Vul hier je wachtwoord in: <input type="password" name="password"><br>
    <button type="submit" value="Submit" name="submit">Submit</button><br>
    <input type="hidden" name="changeprofpic" value="true">
</form>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->