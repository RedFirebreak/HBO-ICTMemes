<?php
    /*
        [DESCRIPTION]
        This checks if the code, username and email matches

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
    echo "<br>";

    // clean user input (never be too sure!)
    $username = mysqli_real_escape_string($dbConnection, $_GET['username']);
    $mail = mysqli_real_escape_string($dbConnection, $_GET['mail']);
    $code = mysqli_real_escape_string($dbConnection, $_GET['code']);

    //Check of de user/email overeenkomen 
    $query = "SELECT `user-id` FROM user WHERE username='$username' AND usermail='$mail'";
    $results = mysqli_query($dbConnection, $query);
    $row = mysqli_fetch_assoc($results);

    $userID = $row['user-id'];

    // Check of de username / email overeenkomen
    if (!isset($userID)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "De verificatiecode komt niet overeen met dit account. Probeer het opnieuw met de link van de email.";
        echo "</div>";
        return;
    }

    // Gebruik het userID om de laatse emailverificatie op te halen
    $query2 = "SELECT `verificatiecode`, `rowdatum` FROM `emailverificatie` WHERE `user-ID` ='$userID' AND geverifieerd='0' AND `soort` = 'emailverificatie' ORDER BY rowdatum DESC LIMIT 1;";
    $results2 = mysqli_query($dbConnection, $query2);
    $row2 = mysqli_fetch_assoc($results2);

    $querycode = $row2['verificatiecode'];
    $querytime = $row2['rowdatum'];

    if (!isset($userID)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Er is geen code gevonden. Probeer het opnieuw met de link van de email.";
        echo "</div>";
        return;
    }

    // Kijk of de verificatierow nog geldig is
    if (strtotime('-1 day') < strtotime($querytime)) {
        if ($querycode == $code) {
            // Username / email klopt
            // Verificatiecode is geldig
            // Verificatiecode klopt

            // Update de user in de database
            $query3 = " UPDATE `emailverificatie`
                        SET geverifieerd='1' 
                        WHERE `user-ID` ='$userID' AND geverifieerd='0' AND soort = 'emailverificatie' ORDER BY rowdatum DESC LIMIT 1;";
            $results3 = mysqli_query($dbConnection, $query3);

            // Kijk of de record is aangepast voor de user
            $query4 = "SELECT `geverifieerd` FROM `emailverificatie` WHERE `user-ID` ='$userID' AND geverifieerd='1' AND `soort` = 'emailverificatie' ORDER BY rowdatum DESC LIMIT 1;";
            $results4 = mysqli_query($dbConnection, $query4);
            $row4 = mysqli_fetch_assoc($results4);

            $geverifieerd = $row4['geverifieerd'];
            

            if ($geverifieerd) { // de emailverificatie row is nu geupdate naar "1" en kan geen tweede keer gebruikt worden
                    // Update nu de user tabel
                    $query4 = " UPDATE `user`
                                SET is_verified='1' 
                                WHERE `user-ID` ='$userID' AND is_verified='0' LIMIT 1;";
                    $results4 = mysqli_query($dbConnection, $query4);

                    // Kijk of de record is aangepast voor de user
                    $query5 = "SELECT is_verified FROM user WHERE `user-ID` ='$userID' AND is_verified='1' LIMIT 1;";
                    $results5 = mysqli_query($dbConnection, $query5);
                    $row5 = mysqli_fetch_assoc($results5);

                    $geverifieerd2 = $row4['geverifieerd'];

                    if ($geverifieerd2) {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "Uw account is nu geverifieerd! Je wordt doorgestuurd naar de login pagina";
                        echo "</div>";
                        header("Refresh:3; url=../account/login.php");
                    return;
                }
            } else {
                Customlog("Verify", "error", "De verificatie-quest kwam niet overeen voor $username.");
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Er is iets mis gegaan met de query, de administrators zijn op de hoogte gebracht.";
                echo "</div>";
                return;
            }


        } else {
            Customlog("Verify", "error", "Iemand met de juiste email / username heeft een verkeerde code ingevuld.");
            echo "<div class='alert alert-danger' role='alert'>";
            echo "De code komt niet overeen. De administrators zijn op de hoogte gebracht.";
            echo "</div>";
            return;
        }
    } else { // als de code ouder is dan 1 dag
        echo "<div class='alert alert-info' role='alert'>";
        echo "De verificatiecode is verlopen of al gebruikt voor een verificatie. Is je account nog niet geverifieerd? <a href='login.php?sendverification=1&email=$mail&username=$username'>Klik hier om een nieuwe te ontvangen</a>.";
        echo "</div>";
        return;
    }
?>