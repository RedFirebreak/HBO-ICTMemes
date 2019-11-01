<?php
$password = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$newpassword2 = $_POST['newpassword2'];
$email = $_POST['email'];

$sql = "UPDATE user SET wachtwoord = '$newpassword' WHERE usermail = '$email'"; //sql query voor veranderen oud wachtwoord
$sql2 = "UPDATE user SET vorig_wachtwoord = $password WHERE usermail = $email"; //sql query voor doorschuiven oud wachtwoord
$sql3 = "SELECT `wachtwoord` FROM `user` WHERE usermail = '$email'"; //sql query voor checken wachtwoord
$result = $dbConnection->query($sql);
$result2 = $dbConnection->query($sql2);
$dbpassword = $dbConnection->query($sql3);

if ($loggedin) {
 	if ($password == $dbpassword) {
  		$result; //verander password in het nieuwe password
  		$result2; // schuif het vorige password door naar de vorige_wachtwoord kolom in database
  		echo 'Your update has been saved';
	}
 	else {
  		echo 'The filled in password does not seem to match your password';
 	}
}
else {
 	echo 'Please log in to change your password'
}



?>

<!-- Start coding here! :D -->
 <!-- This file is going to be required on a page. No need to put ending or starting html tags! -->
 <title>change password</title>
 </head>
  <body>
<form changepassword "/form.changepassword.php">
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