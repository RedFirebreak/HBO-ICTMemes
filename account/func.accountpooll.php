<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>
    <?php
    if (empty($_GET['account'])) {
        // The user is own its own page
                        // Get userinfo
                        $caughtuserid = $LoggedinID;
                        
                } else {
        // The user is trying to see a different account
        $safeaccount = mysqli_real_escape_string($dbConnection, $_GET['account']);
        if ($safeaccount == strtolower($LoggedinUsername)) {
            // Refresh if the user is on its own page
            header('Refresh: 0; url=/account/');
            }
            
            // Check if the account exists
            $sql = "SELECT `user-id` FROM user WHERE `username`='$safeaccount' LIMIT 1;";
            $result = $dbConnection->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $caughtuserid = $row["user-id"];
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Account kon helaas niet gevonden worden.</div>";
                    return;
                }
                if (empty($caughtuserid)) { // Double check for the fetchedID
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Account kon helaas niet gevonden worden.</div>";
                    return;
                }
        }
            // Get userinfo
                $query = "SELECT username, profile_picture, userrole, schoolnaam FROM user WHERE `user-ID`='$caughtuserid'";
                $results = mysqli_query($dbConnection, $query);
                $row2 = mysqli_fetch_assoc($results);
                
                $memeusername = $row2["username"];
                $memeuserpic = $row2["profile_picture"];
                $memeuserrole = $row2["userrole"];
                $memeuserschool = $row2["schoolnaam"];
                return;
    ?>