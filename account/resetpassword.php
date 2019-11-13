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
	
	if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['username']) && !empty($_POST['username'])) {
		
		echo "klaar";
		//data schoonmaken
		$safemail = mysqli_real_escape_string($dbConnection, $_POST['email']);
		$safeusername = mysqli_real_escape_string($dbConnection, $_POST['username']);
		$sql = "select usermail from user where usermail = '{$_POST['email']}';";
		$result = $dbConnection->query($sql);
		if ($result) {
			sendemailverification($safeusername, $safemail, "wachtwoordreset");
		}
	}
	?>

        <?php require('form.reset.php'); ?>

    </body>

    <footer>
        <?php require('../func.footer.php'); ?>
    </footer>

    </html>