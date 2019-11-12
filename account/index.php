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
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Accountpage</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php require('func.accountpooll.php'); ?>
                    <h2>Door de user geuploade memes:</h2>
                    <?php
                    
                    $sql = "SELECT * FROM meme WHERE `user-id`='$caughtuserid' ORDER by `meme-ID` DESC;";
                    $result = $dbConnection->query($sql);
                    if ($result->num_rows > 0) { // This will also happen if the user is not logged in.
                      // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $memelocation = ".."; // to make pathing variable from the homepage
                            $memeid  = $row["meme-ID"];
                            $memetitle  = $row["meme-titel"];
                            $memeuser  = $row["user-ID"];
                            $memedate  = $row["datum"];
                            $memelocation  .= $row["locatie"]; 
                            $memeschool  = $row["school"];

                            echo "<a href='/meme/?id=$memeid'><img class='rounded img-thumbnail user-thumbnail memeaccountimage' alt='$memetitle'src='/storage/meme/loading.gif' data-src='$memelocation'/></a>";
                            echo "  ";
                        }
                    } else { // User has not posted anything ?>
                    <p>
                        <div class='alert alert-info' role='alert'>
                            De user heeft nog geen memes geupload!
                        </div>
                        <br><br><br>
                    </p>
                    <?php
                    }
                    ?>

                </div>
                <div class="col-md-3">
                    <div class="sticky-top" style="top: 82px;">
                        <h1>User-info</h1>
                        <img class="rounded img-thumbnail user-thumbnail" alt="Userpic"
                            src="<?php echo $memeuserpic?>" />
                        <p style="word-wrap:break-word">
                            <?php
                    
                      // Echo userinfo of the meme
                        echo "Gebruiker: <b>" .$memeusername . '</b><br>';
                        if ($memeuserrole == 'admin') {echo "Admin <br>";}
                        if ($memeuserrole == 'uber-admin') {echo "Hoofd-Admin <br>";}
                        echo $memeuserschool . '<br>';

                        if($LoggedinID == $caughtuserid) {

                            require('func.management.php');
                            ?>
                            <?php
                        //require('func.accountinfo.php');
                        
                        }
                        ?>

                    </div>
                </div>
            </div>
    </body>
    <footer>
        <?php require("../func.footer.php"); ?>
    </footer>

    </html>