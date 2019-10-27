<?php
	//In dit bestand sturen we de password reset mail
	
	//bestemming
	$to = $_POST[email];
	
	//onderwerp
	$subject = "Password recovery";
	
	//bericht
	$sql = "select verificatiecode from emailverificatie where usermail=" . $_POST[email];
	$result = $dbConnection->query($sql);
	$vercode = $result->fetch_assoc();
	$message = "Enter the following code in the website to reset your password: <br>" . $vercode['verificatiecode'];
	
	//verstuurder
	$headers = "From: Reset@hbo-ictmemes.nl";
	
	
	//versturen van bericht
	mail($to, $subject, $message, headers);
	
?>