<?php
    /*
        [DESCRIPTION]
        This file changes the username of the logged in user.

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */
if (!empty($_POST['changeusername'])){
	$newusername = mysqli_real_escape_string($dbConnection, $_POST["newusername"]);
	$password = mysqli_real_escape_string($dbConnection, $_POST["password"]);
	$passwordencrypted = md5($password);
	
	$sql = "UPDATE user SET username='$newusername' WHERE `user-id`= '$LoggedinID'"; //sql query voor updaten username
	$sql2 = "SELECT wachtwoord from user WHERE `user-id` = '$LoggedinID'";
	
	if ($Loggedin) {
		$result_password = mysqli_query($dbConnection,$sql2);
		$row = mysqli_fetch_assoc($result_password);
		$dbpassword = $row['wachtwoord'];
		
			if ($passwordencrypted != $dbpassword) {
				$temperror = "de username of wachtwoord is niet correct, vul deze opnieuw in";
			} else {
				$result_newname = mysqli_query($dbConnection,$sql);
				$tempsuccess = "De gebruikersnaam is veranderd naar: $newusername. Log opnieuw in om de wijziging door te zetten.<br>";
			}
	}
	else {
		$temperror = "Log eerst in, voor er gebruik kan worden gemaakt van deze functie";
	}
}  
   
?>
<form action="/account/" id="update" method="post">
    Nieuwe gebruikersnaam: <input type="text" name="newusername"><br>
    Wachtwoord: <input type="password" name="password"><br>
	<input type="hidden" name="changeusername" value="true">

    <button type="submit" value="Submit">Submit</button>
    <button type="reset" value="Reset">Reset</button>
</form>
<br> <br>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->