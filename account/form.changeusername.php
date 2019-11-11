<?php
    /*
        [DESCRIPTION]
        This file changes the username of the logged in user.

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */
if (!empty($_POST['changeusername'])){
	$username = mysqli_real_escape_string($dbConnection, $_POST["username"]);
	$newusername = mysqli_real_escape_string($dbConnection, $_POST["newusername"]);
	$email = mysqli_real_escape_string($dbConnection, $_POST["email"]);
	$password = mysqli_real_escape_string($dbConnection, $_POST["password"]);
	$passwordencrypted = md5($password);
	
	$sql_name = "SELECT username FROM user WHERE `user-id` = '$LoggedinID' ";
	$sql = "UPDATE user SET naam = '$newusername' WHERE `user-id`= $LoggedinID'"; //sql query voor updaten username
	$sql2 = "SELECT wachtwoord from user WHERE `user-id` = '$LoggedinID'";
	
	if ($Loggedin) {
		$result_name = mysqli_query($dbConnection,$sql_name);
		$row = mysqli_fetch_assoc($result_name);
		$dbusername = $row['username'];
		
		$result_password = mysqli_query($dbConnection,$sql_2);
		$row = mysqli_fetch_assoc($result_password);
		$dbpassword = $row['wachtwoord'];
		
			if ($username != $dbusername or $passwordencrypted != $dbpassword) {
				$temperror = "de username of wachtwoord is niet correct, vul deze opnieuw in";
			}
			else {
				$result_newname = mysqli_query($dbConnection,$sql);
				$tempsuccess = "De gebruikersnaam is veranderd naar: $newname <br>";
			}
	}
		
	else {
		$temperror = "Log eerst in, voor er gebruik kan worden gemaakt van deze functie";
	}
}  
   
?>
<form action="/account/" id="update" method="post">
    Huidige gebruikersnaam: <input type="text" name="username"><br>
    Nieuwe gebruikersnaam: <input type="text" name="newusername"><br>
    Email: <input type="text" name="email"><br>
    Wachtwoord: <input type="password" name="password"><br>
	<input type="hidden" name="changeusername" value="true">

    <button type="submit" value="Submit">Submit</button>
    <button type="reset" value="Reset">Reset</button>
</form>
<br> <br>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->