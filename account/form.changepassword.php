<?php
if (!empty($_POST['changepassword'])){
	$password = mysqli_real_escape_string($dbConnection, $_POST["oldpassword"]);
	$passwordencrypted = md5($password);

	$newpassword = mysqli_real_escape_string($dbConnection, $_POST["newpassword"]);
	$newpasswordencrypted = md5($newpassword);

	$newpassword2 = mysqli_real_escape_string($dbConnection, $_POST["newpassword2"]);

	$sql = "UPDATE user SET wachtwoord = '$newpasswordencrypted' WHERE `user-id` = '$LoggedinID'"; //sql query voor veranderen oud wachtwoord
	$sql2 = "SELECT `wachtwoord` FROM `user` WHERE `user-id` = '$LoggedinID'"; //sql query voor checken wachtwoord
	
	if ($Loggedin) {
		$result2 = mysqli_query($dbConnection, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$dbpassword = $row2['wachtwoord'];

		if ($passwordencrypted == $dbpassword) {
			if ($newpassword != $newpassword2) {
				$temperror = "De twee getypte wachtwoorden komen niet overeen, probeer opnieuw";
			} else {
			//verander password in het nieuwe password
			$result = mysqli_query($dbConnection, $sql);
			$tempsuccess = 'Je wachtwoord is gewijzigd';
			}
		} else {
			$temperror = 'Je huidige wachtwoord matcht niet met het ingevulde wachtwoord';
		}
	} else {
		$temperror = 'Log eerst in, voor gebruik kan worden gemaakt van deze functie';
	}
}
?>

<!-- Start coding here! :D -->
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->
<title>change password</title>
</head>
<body>
<form action="/account/" id="update" method="post">
      <form id="changepassword" method="post">
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
        <button type="submit" value="Submit">Submit</button>
    </form>
</form>
<br> <br>
</body>