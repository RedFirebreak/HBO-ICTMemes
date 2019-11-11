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
        <?php require('func.header.php'); ?>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (!empty($_POST)){
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

                            if (!empty($_POST['meme'])) { // if report is a meme
                                // Clean data
                                $MemeID = mysqli_real_escape_string($dbConnection,$_POST['memeid']); // Reported meme
                                $SnitchID = mysqli_real_escape_string($dbConnection,$_POST['loggedinID']); // User who reported
                                $overtreding = mysqli_real_escape_string($dbConnection,$_POST['overtreding']); // Type
                                $beschrijving = mysqli_real_escape_string($dbConnection,$_POST['Toevoeging']); // Extra

                                if ($LoggedinID == $SnitchID ) {
                                // Get Boef ID
                                $sql = "SELECT `user-id` FROM meme WHERE `meme-id`='$MemeID' LIMIT 1";
                                $result = mysqli_query($dbConnection, $sql);
                                $row = mysqli_fetch_assoc($result);

                                $BoefID = $row['user-id'];// Owner of meme

                                // Save in DB
                                $sql2 = "INSERT INTO `meme-report`(`meme-ID`, `snitch-ID`, `boef-ID`, `overtreding`, `beschrijving`)
                                VALUES ('$MemeID','$SnitchID','$BoefID','$overtreding','$beschrijving')";
                                $result2 = mysqli_query($dbConnection, $sql2);

                                if ($result2) {
                                    echo "<div class='alert alert-success' role='alert'>";
                                    echo "Bedankt voor het rapporteren. Je wordt door gestuurd naar de homepagina";
                                    echo "</div>";
                                    header('Refresh: 5; URL=/');
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>";
                                    echo "De rapportering kon helaas niet voltooid worden. De administrators zijn op de hoogte gebracht.";
                                    echo "</div>";
                                    Customlog("Reporting", "log", "SQL failed. Form info: (MemeID: $MemeID SnitchID: $SnitchID Overtreding: $overtreding Beschrijving: $beschrijving)");
                                    //header('Refresh: 5; URL=/');
                                }
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>";
                                    echo "Gebruik de form op de meme zelf.";
                                    echo "</div>";
                                    //header('Refresh: 5; URL=/');
                                }
                                } // Report is not a meme
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo "Directe toegang is niet toegestaan.";
                                echo "</div>";
                            }
                            
                    ?>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <?php require('func.footer.php'); ?>
    </footer>

    </html>