<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */
	
if (!empty($_POST['changepersonal'])){
	$voor = mysqli_real_escape_string($dbConnection, $_POST["voor"]);
	$achter = mysqli_real_escape_string($dbConnection, $_POST["achter"]);
	$adres = mysqli_real_escape_string($dbConnection, $_POST["adres"]);
	$postcode = mysqli_real_escape_string($dbConnection, $_POST["postcode"]);
	$land = mysqli_real_escape_string($dbConnection, $_POST["land"]);
	$datum = mysqli_real_escape_string($dbConnection, $_POST["datum"]);
	$email = mysqli_real_escape_string($dbConnection, $_POST["email"]);
	$wachtwoord = mysqli_real_escape_string($dbConnection, $_POST["wachtwoord"]);
	$passwordencrypted = md5($wachtwoord);
	
	if ($Loggedin){
		if (isset($_POST["submit"])){
				$sql_wachtwoord = "SELECT `wachtwoord` FROM `user` WHERE `user-ID`= $LoggedinID";
				$result_wachtwoord = mysqli_query($dbConnection, $sql_wachtwoord);
				$row = mysqli_fetch_assoc($result_wachtwoord);
				$dbwachtwoord = $row['wachtwoord'];
				
			if ($passwordencrypted != $dbwachtwoord) {
					$temperror = "Het wachtwoord is niet correct";
			}	
				
			else {
				$sql_id = "INSERT INTO `private-info` (`user-ID`) VALUES ($LoggedinID)";
				$result_id = mysqli_query($dbConnection, $sql_id);
				
				if ($voor){
					$sql_voor = "UPDATE `private-info` SET voornaam = '$voor' WHERE `user-ID` = '$LoggedinID'";
					$result_voor = mysqli_query($dbConnection, $sql_voor);
					$tempsuccess = "De gegevens zijn geüpdated";
				}
					
				if ($achter){
					$sql_achter = "UPDATE `private-info` SET achternaam = '$achter' WHERE `user-ID` = '$LoggedinID'";
					$result_achter = mysqli_query($dbConnection, $sql_achter);
					$tempsuccess = "De gegevens zijn geüpdated";
				}
					
				if ($adres){
					$sql_adres = "UPDATE `private-info` SET adres = '$adres' WHERE `user-ID` = '$LoggedinID'";
					$result_adres = mysqli_query($dbConnection, $sql_adres);
					$tempsuccess = "De gegevens zijn geüpdated";
				}
					
				if ($postcode){
					$sql_postcode = "UPDATE `private-info` SET postcode = '$postcode' WHERE `user-ID` = '$LoggedinID'";
					$result_postcode = mysqli_query($dbConnection, $sql_postcode);
					$tempsuccess = "De gegevens zijn geüpdated";
				}
					
				if ($land){
					$sql_land = "UPDATE `private-info` SET land = '$land' WHERE `user-ID` = '$LoggedinID'";
					$result_land = mysqli_query($dbConnection, $sql_land);
					$tempsuccess =  "De gegevens zijn geüpdated";
				}
					
				if ($datum){
					$sql_datum = "UPDATE `private-info` SET geboortedatum = '$datum' WHERE `user-ID` = '$LoggedinID'";
					$result_datum = mysqli_query($dbConnection, $sql_datum);
					$tempsuccess =  "De gegevens zijn geüpdated";
				}	
			}
		}
	}
	else {
		echo "Log eerst in, voor er gebruik kan worden gemaakt van deze functie";
	}
}
?>
<form action="/account/" id="update" method="post">
	Voornaam: <input type="text" name="voor"><br>
	<input type="hidden" name="changepersonal" value="true">
	Achternaam: <input type="text" name="achter"><br>
    Adres: <input type="text" name="adres"><br>
    Postcode: <input type="text" name="postcode"><br>
    Land: <input type="text" name="land"><br>
    Geboortedatum: <input type="date" name="datum"><br>
	Wachtwoord: <input type="password" name="wachtwoord"><br>
	
	
    <button type="submit" value="Submit" name="submit">Submit</button>
    <button type="reset" value="Reset">Reset</button>
</form>
<br> <br>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->