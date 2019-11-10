<?php
$password = mysqli_real_escape_string(dbConnection, $_POST["oldpassword"]);
$newpassword = mysqli_real_escape_string(dbConnection, $_POST["newpassword"]);
$newpassword2 = mysqli_real_escape_string(dbConnection, $_POST["newpassword2"]);
$email = mysqli_real_escape_string(dbConnection, $_POST["email"]);

$sql = "UPDATE user SET wachtwoord = '$newpassword' WHERE usermail = '$email'"; //sql query voor veranderen oud wachtwoord
$sql2 = "UPDATE user SET vorig_wachtwoord = $password WHERE usermail = $email"; //sql query voor doorschuiven oud wachtwoord
$sql3 = "SELECT `wachtwoord` FROM `user` WHERE usermail = '$email'"; //sql query voor checken wachtwoord
$result = mysqli_query($dbConnection, $sql);
$result2 = mysqli_query($dbConnection, $sql2);
$dbpassword = mysqli_query($dbConnection, $sql3);

if ($loggedin) {
	if ($password == $dbpassword) {
		if ($newpassword != $newpassword2) {
			echo "De twee getypte wachtwoorden komen niet overeen, probeer opnieuw";
		}
		else {
  		$result; //verander password in het nieuwe password
  		$result2; // schuif het vorige password door naar de vorige_wachtwoord kolom in database
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



?>

<!-- Start coding here! :D -->
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->
<title>change password</title>
</head>

<body>
    <form id="changepassword" method="post">
        Email address:<br>
        <input type="text" name="email">
        <br>
        Old password:<br>
        <input type="text" name="oldpassword">
        <br>
        New password:<br>
        <input type="text" name="newpassword">
        <br>
        New password again:<br>
        <input type="text" name="newpassword2">
        <br>
        <input type="submit" name="submit">
    </form>
</body>