
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
	$username_sql	= "SELECT `username` FROM `user` WHERE user-ID = '$loggedinID'";
	$voornaam_sql	= "SELECT `voornaam` FROM `private-info` WHERE user-ID = '$loggedinID'";
	$achternaam_sql	= "SELECT `achternaam` FROM `private-info` WHERE user-ID = '$loggedinID'";
	$adres_sql		= "SELECT `adres` FROM `private-info` WHERE user-ID = '$loggedinID'";
	$postcode_sql	= "SELECT `postcode` FROM `private-info` WHERE user-ID = '$loggedinID'";
	$datum_sql		= "SELECT `datum` FROM `private-info` WHERE user-ID = '$loggedinID'";
	$land_sql		= "SELECT `land` FROM `private-info` WHERE user-ID = '$loggedinID'";
	
	$username_info	 = mysqli_query($dbConnection, $username_sql);
	$voornaam_info	 = mysqli_query($dbConnection, $voornaam_sql);
	$achternaam_info = mysqli_query($dbConnection, $achternaam_sql);
	$adres_info		 = mysqli_query($dbConnection, $adres_sql);
	$postcode_info	 = mysqli_query($dbConnection, $postcode_sql);
	$datum_info		 = mysqli_query($dbConnection, $datum_sql);
	$land_info		 = mysqli_query($dbConnection, $land_sql);

?>

    <!-- Start coding here! :D -->
	<img src=/storage/profielfoto/default.png alt="Profile Picture" "max-height:75px;width:130px;">
	gebruikersnaam:	<?php echo $username_info ?>
	voornaam: <?php echo $voornaam_info?>
	achternaam: <?php echo $achternaam_info ?>
	adres: <?php echo $adres_info ?>
	postcode: <?php echo $postcode_info ?>
	geboortedatum: <?php echo $datum_info ?>
	land van herkomst: <?php echo $land_info ?>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->