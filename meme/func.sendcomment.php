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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (!empty($_POST)){

                        // Data validation
                            // First, cleaning
                            $cleancomment= mysqli_real_escape_string($dbConnection,$_POST['comment']);
                            $cleanmemeid= mysqli_real_escape_string($dbConnection,$_POST['memeid']);
                            $cleanuserid= mysqli_real_escape_string($dbConnection,$_POST['userid']);
                            
                            // then, checkin if everything is here

                            if (empty($cleanmemeid)) {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo "De meme kon niet gevonden worden. Probeer het later nog eens.";
                                echo "</div>";
                                Customlog("sendcomment", "error", "Meme kon niet geplaatst worden: $username (UserID: $LoggedinID)");
                                header('Refresh: 10; URL=../');
                                exit;
                            }
                            if (empty($cleancomment)) {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo "Comment mag niet leeg zijn.";
                                echo "</div>";
                                header('Refresh: 10; URL=../');
                                exit;
                            }
                            if (empty($cleanuserid)) {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo "Je moet ingelogd zijn om dit te kunnen doen!";
                                echo "</div>";
                                Customlog("sendcomment", "error", "A not logged in user just tried placing a comment.");
                                header('Refresh: 10; URL=../');
                                exit;
                            }

                            $amountcomment = strlen($cleancomment);
                            if ($amountcomment >= 500) {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo "Je comment kan niet langer zijn dan 500 tekens. Probeer het nog eens.";
                                echo "</div>";
                                exit;
                            }

                            // Prepare the mysql and execute it
                            $query = "INSERT INTO comments (`meme-id`, `user-id`, `inhoud`) 
                                    VALUES('$cleanmemeid', '$cleanuserid', '$cleancomment')";
                                mysqli_query($dbConnection, $query);
                            
                                header("Location: /meme/?id=$cleanmemeid");


                    } else {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "Deze pagina kan niet direct worden benaderd. Probeer het nog eens via een comment-formulier.";
                        echo "</div>";
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