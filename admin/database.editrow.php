<?php
$soort = mysqli_real_escape_string($dbConnection, $_POST['soort']);
switch ($soort) {
    case 'users':
        // needed improvement: uberadmins are allowed to edit userrole.
        // Get info
        $newusermail = mysqli_real_escape_string($dbConnection, $_POST['newusermail']);
        $newusername = mysqli_real_escape_string($dbConnection, $_POST['newusername']);
        $newschoolnaam = mysqli_real_escape_string($dbConnection, $_POST['newschool']);
        $newverified = mysqli_real_escape_string($dbConnection, $_POST['newverified']);
        //verwerk voor database
            if ($newverified == 'ja') {
                $newverified = 1;
            } elseif ($newverified == 'nee') {
                $newverified = 0;
            }
        $newbanned = mysqli_real_escape_string($dbConnection, $_POST['newbanned']);
        //verwerk voor database
            if ($newbanned == 'ja') {
                $newbanned = 1;
            } elseif ($newbanned == 'nee') {
                $newbanned = 0;
            }
        $userid = mysqli_real_escape_string($dbConnection, $_POST['userid']);

        // Check if the row thats gonna be edited is an admin
        $sql = "SELECT `userrole` FROM user WHERE `user-id`='$userid' LIMIT 1";
        $result = mysqli_query($dbConnection, $sql);
        $row = mysqli_fetch_assoc($result);
        $userrole = $row['userrole'];

        // if and uberadmin is doing the request, dont check for admin
            if ($LoggedinUserrole == 'uber-admin') {
                // uber admins are allowed to edit everything!
            } else {
                if ($userrole == 'uber-admin') {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Andere admins mogen geen uber-admins wijzigen";
                    echo "</div>";
                    // Log the failed attempt
                    Customlog("Change-user", "critical", "Admin $LoggedinID tried changing a uberadmin($userid)!.");
                    header('Refresh: 2; URL=/admin/?page=users');
                    break;
                } elseif ($userrole == 'admin') {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "Andere admins mogen geen admins wijzigen";
                    echo "</div>";
                    // Log the failed attempt
                    Customlog("Change-user", "critical", "Admin $LoggedinID tried changing another admin($userid)!.");
                    header('Refresh: 2; URL=/admin/?page=users');
                    break;
                }
            } // User is now allowed to edit the row!

            $sql2 = "UPDATE user SET usermail='$newusermail', username='$newusername', schoolnaam='$newschoolnaam', is_verified='$newverified', gebanned='$newbanned' WHERE `user-id`='$userid'";
            $result2 = mysqli_query($dbConnection, $sql2);

        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "User successvol gewijzigd";
            echo "</div>";
            Customlog("Change-user", "log", "Admin $LoggedinID successfully changed user $userid.");
            header('Refresh: 2; URL=/admin/?page=users');
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "User kon niet gewijzigd worden.";
            echo "</div>";
            Customlog("Change-user", "error", "Admin $LoggedinID tried changing a user. The query failed.");
            header('Refresh: 2; URL=/admin/?page=users');
        break;
        }
        header('Refresh: 2; URL=/admin/?page=users');
        break;
    case 'scholenenadmins':
        // not supported yet
        header('Refresh: 2; URL=/admin/');
        break;
    case 'memes':
        $newtitel = mysqli_real_escape_string($dbConnection, $_POST['newtitel']);
        $newlocatie = mysqli_real_escape_string($dbConnection, $_POST['newlocatie']);
        $newschoolnaam = mysqli_real_escape_string($dbConnection, $_POST['newschool']);
        $memeid= mysqli_real_escape_string($dbConnection, $_POST['memeid']);

        $sql2 = "UPDATE `meme` SET `meme-titel`='$newtitel',`locatie`='$newlocatie',`school`='$newschoolnaam' WHERE `meme-id`='$memeid'";
        $result2 = mysqli_query($dbConnection, $sql2);
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Meme successvol gewijzigd";
            echo "</div>";
            Customlog("Change-meme", "log", "Admin $LoggedinID successfully changed meme $memeid.");
            header('Refresh: 2; URL=/admin/?page=memes');
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Meme kon niet gewijzigd worden.";
            echo "</div>";
            Customlog("Change-meme", "error", "Admin $LoggedinID tried changing a meme. The query failed.");
            header('Refresh: 2; URL=/admin/?page=memes');
            break;
        }
        header('Refresh: 2; URL=/admin/?page=memes');
        break;
    case 'tags':
        // Get the tagid
        $tagid = mysqli_real_escape_string($dbConnection, $_POST['tagid']);
        $newtagname = mysqli_real_escape_string($dbConnection, $_POST['newtagname']);
        // Check if tagid is not adminpost
        $sql = "SELECT `tag-id` FROM tags WHERE tagnaam='AdminPost' LIMIT 1";
        $result = mysqli_query($dbConnection, $sql);
        $row = mysqli_fetch_assoc($result);
        $adminpostid = $row['tag-id'];

        if ($adminpostid == $tagid) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "AdminPost mag niet gewijzigd worden!";
            echo "</div>";
            // Log the failed attempt
            Customlog("Change-Tag", "critical", "Admin $LoggedinID tried changing AdminPost.");
            header('Refresh: 2; URL=/admin/?page=tags');
            break;
        }
        // Delete the post
        $sql2 = "UPDATE `tags` SET tagnaam = '$newtagname' WHERE `tag-id`='$tagid'";
        $result2 = mysqli_query($dbConnection, $sql2);

        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Tag successvol gewijzigd";
            echo "</div>";
            Customlog("Change-Tag", "log", "Admin $LoggedinID successfully changed tag $tagid.");
            header('Refresh: 2; URL=/admin/?page=tags');
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Tag kon niet gewijzigd worden.";
            echo "</div>";
            Customlog("Change-Tag", "error", "Admin $LoggedinID tried changing a tag. The query failed.");
            header('Refresh: 2; URL=/admin/?page=tags');
            break;
        }
        header('Refresh: 2; URL=/admin/?page=tags');
        break;
    case 'support':
        $supportid = mysqli_real_escape_string($dbConnection, $_POST['supportid']);
        $newopgelost = mysqli_real_escape_string($dbConnection, $_POST['newopgelost']);
        //verwerk voor database
                if ($newopgelost == 'ja') {
                    $newopgelost = 1;
                } elseif ($newopgelost == 'nee') {
                    $newopgelost = 0;
                }

        $sql2 = "UPDATE support SET opgelost = '$newopgelost' WHERE `support-id`='$supportid'";
        $result2 = mysqli_query($dbConnection, $sql2);
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Support ticket successvol gewijzigd";
            echo "</div>";
            Customlog("Change-support", "log", "Admin $LoggedinID successfully changed support ticket $tagid.");
            header('Refresh: 2; URL=/admin/?page=support');
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Support ticket kon niet gewijzigd worden.";
            echo "</div>";
            Customlog("Change-support", "error", "Admin $LoggedinID tried changing a support ticket. The query failed.");
            header('Refresh: 2; URL=/admin/?page=support');
            break;
        }
        header('Refresh: 2; URL=/admin/?page=support');
        break;
}

?>