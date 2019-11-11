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
        <title>HBO-Memes - PAGENAME</title>
        <?php require('../func.header.php'); ?>
    </head>

    <body>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-12">
                    <?php 
            // Als "href="?emailverificatie='1' gezet is, wordt dit uitgevoerd.
            // Emailverificatie
            if (isset($_GET['emailverificatie'])) {
              require('func.emailverificatie.php');
            }
          ?>

                    <!-- OF de ander -->

                    <?php 
            // Als "href="?resetpassword='1' gezet is, wordt dit uitgevoerd.
            // ResetPassword
            if (isset($_GET['resetpassword'])) {
              require('form.resetpassword.php');
            }
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
			else {
				echo "Zorg ervoor dat je beide vakken invult";
			}
          ?>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <?php require('../func.footer.php'); ?>
    </footer>

    </html>