<?php

if (!empty($_POST['changepassword'])){
	
	$password = mysqli_real_escape_string(dbConnection, $_POST["oldpassword"]);
	$passwordencrypted = md5($password);
	$newpassword = mysqli_real_escape_string(dbConnection, $_POST["newpassword"]);
	$newpasswordencrypted = md5($newpassword);
	$newpassword2 = mysqli_real_escape_string(dbConnection, $_POST["newpassword2"]);
	$newpasswordencrypted2 = md5($newpassword2);
	$email = mysqli_real_escape_string(dbConnection, $_POST["email"]);

	$sql = "UPDATE user SET wachtwoord = '$newpasswordencrypted' WHERE usermail = '$email'"; //sql query voor veranderen oud wachtwoord
	$sql3 = "SELECT `wachtwoord` FROM `user` WHERE usermail = '$email'"; //sql query voor checken wachtwoord
	$result = mysqli_query($dbConnection, $sql);
	$dbpassword = mysqli_query($dbConnection, $sql3);

	if ($Loggedin) {
		if ($password == $dbpassword) {
			if ($newpassword != $newpassword2) {
				echo "De twee getypte wachtwoorden komen niet overeen, probeer opnieuw";
			}
			else {
			$result; //verander password in het nieuwe password
			echo 'De update is opgeslagen';
			}
		}
		else {
			echo 'Je huidige wachtwoord matcht niet met het ingevulde wachtwoord';
		}
	}
	else {
		echo 'Log eerst in, voor gebruik kan worden gemaakt van deze functie';
	}
}
?>

<!-- Start coding here! :D -->
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->
<title>change password</title>
</head>

<body>
    <form id="changepassword" method="post">
        Email adres:<br>
        <input type="text" name="email">
        <br>
        Huidig wachtwoord:<br>
        <input type="password" name="oldpassword">
        <br>
        Nieuw wachtwoord:<br>
        <input type="password" name="newpassword">
        <br>
        Herhaal nieuwe wachtwoord:<br>
        <input type="password" name="newpassword2">
		<input type="hidden" name="changepassword" value="true">
        <br>
        <input type="submit" name="submit">
    </form>
	<br> <br>
</body>