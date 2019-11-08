<?php
    /*
        [DESCRIPTION]
        This file changes the username of the logged in user.

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */

	$username = mysqli_real_escape_string(dbConnection, $_POST["username"]);
	$newusername = mysqli_real_escape_string(dbConnection, $_POST["newusername"]);
	$email = mysqli_real_escape_string(dbConnection, $_POST["email"]);
	$password = mysqli_real_escape_string(dbConnection, $_POST["password"])
	
	$sql = "UPDATE user SET naam = '$newusername' WHERE usermail= '$email'"; //sql query voor updaten username
	$sql2 = "SELECT wachtwoord from user WHERE user-id = '$loggedinID'";
    $result = mysqli_query($dbConnection,$sql);
	$result2 = mysqli_query($dbConnection,$sql2);
	
	if ($Loggedin) {
		if ($password == $result2) {
			$result;
			echo "De gebruikersnaam is veranderd naar: $newusername <br>";
		}
		else {
			echo "Het ingevulde wachtwoord is niet correct.";
		}
	} 	
	else {
		echo "Log eerst in, voor er gebruik kan worden gemaakt van deze functie";
	}
      
?>

<form id="update" method="post">
			Huidige gebruikersnaam: <input type="text" name="username"><br>
			Nieuwe gebruikersnaam: <input type="text" name="newusername"><br>
			Email: <input type="text" name="email"><br>
			Wachtwoord: <input type="text" name="password"><br>
			
			<button type="submit" value="Submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
		</form>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->