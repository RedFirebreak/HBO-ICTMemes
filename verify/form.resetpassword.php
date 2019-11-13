<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>
<?php
	if (empty($_POST)) {
	$username = mysqli_real_escape_string($dbConnection, $_GET['username']);
	$mail = mysqli_real_escape_string($dbConnection, $_GET['mail']);
	$code = mysqli_real_escape_string($dbConnection, $_GET['code']);

	$formlink = "/verify/?wachtwoordreset=true&username=$username&mail=$mail&code=$code";
	?>


<form action="<?php echo $formlink ?>" method="post">
    <p>Password<br>
        <input type="password" id="newpassword" name="newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            required></p>
    <div class="col-md-6" id="message">
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
    <p>Confirm password<br>
        <input type="password" name="newpasswordcheck" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p>
    <?php echo recaptchaform ();?>
    <button type="submit" class="btn btn-primary" name="reset_password">Change Password</button>
</form>

<?php
} // end isset form
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
			echo "Recaptcha is niet ingevuld, niet correct of is verlopen. Klik opnieuw op de knop in de mail.";
			echo "</div>";
			return;
		}
	//captcha check done!
			
	//checken of de data er is
	if (isset($_POST['newpassword']) && !empty($_POST['newpassword']) && isset($_POST['newpasswordcheck']) && !empty($_POST['newpasswordcheck'])) {
		$safepassword = mysqli_real_escape_string($dbConnection, $_POST['newpassword']);
		$safepasscheck = mysqli_real_escape_string($dbConnection, $_POST['newpasswordcheck']);
		$encryptedpassword = md5($safepassword);
		$code = mysqli_real_escape_string($dbConnection, $_GET['code']);

		//checken of de wachtwoorden goed zijn ingevuld
		if ($safepass = $safepasscheck) {
			//checken of de user-ID en verificatiecode overeenkomen
			$username = $_GET['username'];
			$sql = "select `user-ID` from user where `username`='$username';";
			$result = $dbConnection->query($sql);
			$row = mysqli_fetch_assoc($result);
			$userID = $row['user-ID'];
			
			$sql = "select `verificatiecode`, `rowdatum` from emailverificatie where `user-ID`='".$userID."' AND geverifieerd= 0 order by rowdatum DESC limit 1";
			$result = $dbConnection->query($sql);
			$row2 = mysqli_fetch_assoc($result);
			$vercode = $row2['verificatiecode'];
			$rowdate = $row2['rowdatum'];
			if (strtotime('-1 day') < strtotime($rowdate)) {
				if ($vercode==$code) {
					$sql3 = "	UPDATE `user` 
								SET wachtwoord='$encryptedpassword'
								WHERE `user-ID` ='$userID'";
					$result = $dbConnection->query($sql3);

					// Update emailverification form
					$query3 = " UPDATE `emailverificatie`
								SET geverifieerd='1' 
								WHERE `user-ID` ='$userID' AND geverifieerd='0' AND soort = 'wachtwoordreset' ORDER BY rowdatum DESC LIMIT 1;";
					$results3 = mysqli_query($dbConnection, $query3);
					
					echo "<div class='alert alert-success' role='alert'>";
					echo "Je wachtwoord is veranderd! Je wordt doorgestuurd";
					echo "</div>";
					header('Refresh: 5; URL=/account/login.php');
					return;
				} else {
					Customlog("Verify", "error", "Iemand met de juiste email / username heeft een verkeerde code ingevuld.");
					echo "<div class='alert alert-danger' role='alert'>";
					echo "De code komt niet overeen. De administrators zijn op de hoogte gebracht.";
					echo "</div>";
					return;
				}
			} else { // als de code ouder is dan 1 dag
				echo "<div class='alert alert-info' role='alert'>";
				echo "De verificatiecode is verlopen of al gebruikt voor een verificatie. Is je account nog niet geverifieerd? <a href='login.php?sendverification=1&email=$mail&username=$username'>Klik hier om een nieuwe te ontvangen</a>.";
				echo "</div>";
				return;
			}
		}
		else {
			echo "<div class='alert alert-info' role='alert'>";
			echo "Zorg ervoor dat de inhoud van beide vakken met elkaar overeenkomt";
			echo "</div>";
		}
	}
	else {
		echo "<div class='alert alert-info' role='alert'>";
		echo "Zorg ervoor dat je beide vakken invult";
		echo "</div>";
	}
?>