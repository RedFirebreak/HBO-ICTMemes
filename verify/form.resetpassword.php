<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>

<!--
    1. laat de user een nieuw wachtwoord invoeren (kan je kopieren uit registratie. Roep mij(Stefan) als dat niet lukt
    2. Submit de form VIA POST , naar dezelfde pagina (/verify/index.php)
    2. clean de user-input van de POST

    3. Maak een eerste query, die kijkt of de user-id en verificatiecode in de mail overeencomen
      -- De verificatiecode zal in de GET staan(dus niet POST van de form), en kan dus aangeroepen worden met $_GET['verificatiecode'] ofzoiets
    
    4. Komt de informatie overeen, verander het wachtwoord van de user met een tweede query
    5. Informeer de user 
    -->

<body>
	<form action="/verify/index.php" method="post">
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
</body>

<?php
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
			
	//checken of de data er is
	if (isset($_POST['newpassword']) && !empty($_POST['newpassword']) && isset($_POST['newpasswordcheck']) && !empty($_POST['newpasswordcheck'])) {
		$safepassword = mysql_real_escape_string($_POST['newpassword']);
		$safepasscheck = mysql_real_escape_string($_POST['newpasswordcheck']);
		//checken of de wachtwoorden goed zijn ingevuld
		if ($safepass = $safepasscheck) {
			//checken of de user-ID en verificatiecode overeenkomen
			$sql = "select verificatiecode from emailverificatie where `user-ID`={$_GET['username']};"
			$result = $dbConnection->query($sql);
			$vercode = mysqli_fetch_assoc($result);
			if ($vercode['verificatiecode']=$_GET['code']) {
				$sql = "insert into user (`wachtwoord`) values ('{$safepassword}');";
				echo "Succes! Het wachtwoord is veranderd.";
			}
		}
		else {
			echo "Zorg ervoor dat de inhoud van beide vakken met elkaar overeenkomt";
		}
		}
		else {
			echo "Zorg ervoor dat je beide vakken invult";
		}
		
?>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->