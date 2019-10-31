<?php
    /*
        [DESCRIPTION]
        This file changes the username of the logged in user.

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */

	$username = $_POST['username'];
	$newusername = $_POST['newusername'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "UPDATE user SET naam = '$newusername' WHERE usermail= '$email'"; //sql query voor updaten username
	$sql2 = "SELECT wachtwoord from user WHERE user-id = '$loggedinID'";
    $result = $dbConnection->query($sql);
	$result2 = $dbConnection->query($sql2);
	
	if ($Loggedin) {
		if ($password == $result2) {
			$result;
			echo "your username has been updated to: $newusername <br>";
			echo "A confirmation email will be sent to your mail, when confirmed, this change will be 'permanent'. <br>";
		}
		else {
			echo "Your password does not seem to match your profile.";
		}
	} 	
	else {
		echo "Nobody is logged in, please log in before trying to change a username";
	}
      
?>

<form id="update" method="post">
			current username: <input type="text" name="username"><br>
			New username: <input type="text" name="newusername"><br>
			email: <input type="text" name="email"><br>
			password: <input type="text" name="password"><br>
			
			<button type="submit" value="Submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
		</form>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->