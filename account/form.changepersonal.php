<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */
	
	$voor = mysqli_real_escape_string(dbConnection, $_POST["voor"]);
	$achter = mysqli_real_escape_string(dbConnection, $_POST["achter"]);
	$adres = mysqli_real_escape_string(dbConnection, $_POST["adres"]);
	$postcode = mysqli_real_escape_string(dbConnection, $_POST["postcode"]);
	$land = mysqli_real_escape_string(dbConnection, $_POST["land"]);
	$datum = mysqli_real_escape_string(dbConnection, $_POST["datum"]);
	$email = mysqli_real_escape_string(dbConnection, $_POST["email"]);
	$wachtwoord = mysqli_real_escape_string(dbConnection, $_POST["wachtwoord"]);
	
	if ($loggedin){
		if (isset($_POST["submit"]) {
			if (isset($voor)){
				$sql_voor = "UPDATE private-info SET voornaam = '$voor' WHERE user-ID = '$loggedinID'";
				$result_voor = mysqli_query($dbConnection, $sql_voor);
			}
			if (isset($achter)){
				$sql_achter = "UPDATE private-info SET achternaam = '$achter' WHERE user-ID = '$loggedinID'";
				$result_achter = mysqli_query($dbConnection, $sql_achter);
			}
			if (isset($adres)){
				$sql_adres = "UPDATE private-info SET adres = '$adres' WHERE user-ID = '$loggedinID'";
				$result_adres = mysqli_query($dbConnection, $sql_adres);
			}
			if (isset($postcode)){
				$sql_postcode = "UPDATE private-info SET postcode = '$postcode' WHERE user-ID = '$loggedinID'";
				$result_postcode = $mysqli_query($dbConnection, $sql_postcode);
			}
			if (isset($land)){
				$sql_land = "UPDATE private-info SET land = '$land' WHERE user-ID = '$loggedinID'";
				$result_land = mysqli_query($dbConnection, $sql_land);
			}
			if (isset($datum)){
				$sql_datum = "UPDATE private-info SET datum = '$datum' WHERE user-ID = '$loggedinID'";
				$result_datum = mysqli_query($dbConnection, $sql_datum);
			}
			if (isset($wachtwoord)){
				$sql_wachtwoord = "SELECT `wachtwoord` FROM `user` WHERE usermail = '$email'";
				$result_wachtwoord = mysqli_query($dbConnection, $sql_wachtwoord);
			}
			if (empty($wachtwoord)){
				echo "Error message: Er is geen wachtwoord ingevuld";
			}
		}
	}
	else {
		echo "Log eerst in, voor er gebruik kan worden gemaakt van deze functie"
	}
?>

<form id="change" method="post">
			email: <input type="text" name="email"><br>
			wachtwoord: <input type="text" name="wachtwoord"><br>
			Voornaam: <input type="text" name="voor"><br>
			Achternaam: <input type="text" name="achter"><br>
			Adres: <input type="text" name="adres"><br>
			Postcode: <input type="text" name="postcode"><br>
			Land: <input type="text" name="Land"><br>
			Geboortedatum: <input type="text" name="datum"><br>
			
			<button type="submit" value="Submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
		</form>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->