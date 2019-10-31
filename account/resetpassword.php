<!DOCTYPEhtml>
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>

<html>
  <head>
    <!-- Edit the pagename only -->
    <title>HBO-Memes - INSERT MEMETITLE</title>
    <?php require('../func.header.php'); ?>
  </head>

  <body>

    <!-- Start coding here! :D -->
	<?php
	//Hier sturen we de password reset mail
	
	if (isset($_POST['email'])) {
		echo "klaar";
		//data schoonmaken
		$safemail = mysqli_real_escape_string($dbconnection, $_POST['email']);
		
		//bestemming
		$to = $safemail;
		
		//onderwerp
		$subject = "Password recovery";
		
		//bericht
		$sql = "select verificatiecode from emailverificatie where usermail=" . $safemail;
		$result = $dbConnection->query($sql);
		$vercode = $result->fetch_assoc();
		$message = "Enter the following code in the website to reset your password: <br>" . $vercode['verificatiecode'];
		
		//verstuurder
		$headers = "From: Reset@hbo-ictmemes.nl";
		
		
		//versturen van bericht
		mail($to, $subject, $message, headers);
	}
	?>
	
    <?php require('form.reset.php'); ?>

  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>