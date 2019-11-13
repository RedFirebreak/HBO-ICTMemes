<?php
$soort = mysqli_real_escape_string($dbConnection, $_POST['soort']);
switch ($soort) {
    case 'users':
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
                    Customlog("Delete-user", "critical", "Admin $LoggedinID tried deleting a uberadmin($userid)!.");
                    ?>
                    <script type="text/javascript">
                    window.setTimeout(function() {
                        // Move to a new location
                        window.location.href = "/admin/?page=users";
                    }, 2500);
                    </script>
                    <?php
                    break;
                } elseif ($userrole == 'admin') {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo "AdminPost mag niet gewijzigd worden!";
                    echo "</div>";
                    // Log the failed attempt
                    Customlog("Delete-user", "critical", "Admin $LoggedinID tried deleting another admin($userid)!.");
                    ?>
                    <script type="text/javascript">
                    window.setTimeout(function() {
                        // Move to a new location
                        window.location.href = "/admin/?page=users";
                    }, 2500);
                    </script>
                    <?php
                    break;
                }
            } // User is now allowed to edit the row!

            $sql2 = "DELETE FROM `user` WHERE `user-id`='$userid'";
            $result2 = mysqli_query($dbConnection, $sql2);

        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "User successvol gewijzigd";
            echo "</div>";
            Customlog("Delete-user", "log", "Admin $LoggedinID successfully changed user $userid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=users";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "User kon niet verwijderd worden. Het kan zijn dat deze user nog memes heeft geupload.";
            echo "</div>";
            Customlog("Delete-user", "error", "Admin $LoggedinID tried changing a user. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=users";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=users";
        }, 2500);
        </script>
        <?php
        break;
    case 'scholenenadmins':
        // Not supported yet
        break;
    case 'memes':
        $memeid= mysqli_real_escape_string($dbConnection, $_POST['memeid']);
        $location = "..";
        $location .= mysqli_real_escape_string($dbConnection, $_POST['locatie']);
        // Delete the meme from the server
        unlink($location);

        if (!file_exists($location)) {
            // if the file does not exist anymore, update the database
            $sql2 = "DELETE FROM `meme` WHERE `meme-id`='$memeid'";
            $result2 = mysqli_query($dbConnection, $sql2);
    
            // Check if query succeeded
            if ($result2) {
                echo "<div class='alert alert-success' role='alert'>";
                echo "Meme successvol gedelete";
                echo "</div>";
                Customlog("Delete-meme", "log", "Admin $LoggedinID successfully deleted meme $memeid.");
                ?>
                <script type="text/javascript">
                window.setTimeout(function() {
                    // Move to a new location
                    window.location.href = "/admin/?page=memes";
                }, 2500);
                </script>
                <?php
                break;
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Meme kon niet gedelete worden.";
                echo "</div>";
                Customlog("Delete-meme", "error", "Admin $LoggedinID tried deleting a meme. The query failed.");
                ?>
                <script type="text/javascript">
                window.setTimeout(function() {
                    // Move to a new location
                    window.location.href = "/admin/?page=memes";
                }, 2500);
                </script>
                <?php
                break;
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Meme afbeelding kon niet gedelete worden.";
            echo "</div>";
            Customlog("Delete-meme", "error", "Admin $LoggedinID tried deleting a meme. The deleting of the file failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=memes";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=memes";
        }, 2500);
        </script>
        <?php
        break;
    case 'tags':
        // Get the tagid
        $tagid = mysqli_real_escape_string($dbConnection, $_POST['tagid']);
        // Check if tagid is not adminpost
        $sql = "SELECT `tag-id` FROM tags WHERE tagnaam='AdminPost' LIMIT 1";
        $result = mysqli_query($dbConnection, $sql);
        $row = mysqli_fetch_assoc($result);
        $adminpostid = $row['tag-id'];

        // Set all the memes with this tag

        if ($adminpostid == $tagid) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "AdminPost mag niet verwijderd worden!";
            echo "</div>";
            // Log the failed attempt
            Customlog("Delete-Tag", "error", "Admin $LoggedinID tried deleting AdminPost.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=tags";
            }, 2500);
            </script>
            <?php
            break;
        }

        

        // Get Meme
        $sql = "SELECT `tag-id` FROM tags WHERE tagnaam='Meme' LIMIT 1";
        $result = mysqli_query($dbConnection, $sql);
        $row = mysqli_fetch_assoc($result);
        $memepostid = $row['tag-id'];

        // Check if tagid is not meme
        if ($memepostid == $tagid) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Meme mag niet verwijderd worden!";
            echo "</div>";
            // Log the failed attempt
            Customlog("Delete-Tag", "error", "Admin $LoggedinID tried deleting Meme.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=tags";
            }, 2500);
            </script>
            <?php
            break;
        }
        // Change all existing memes to "memetag"
        $sql2 = "UPDATE `memetag` SET `tag-id`='$memepostid' WHERE `tag-id`='$tagid'";
        $result2 = mysqli_query($dbConnection, $sql2);

        // Delete the post
        $sql2 = "DELETE FROM tags WHERE `tag-id`='$tagid'";
        $result2 = mysqli_query($dbConnection, $sql2);

        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Tag successvol verwijderd";
            echo "</div>";
            Customlog("Delete-Tag", "log", "Admin $LoggedinID successfully deleted tag $tagid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=tags";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Tag kon niet verwijderd worden.";
            echo "</div>";
            Customlog("Delete-Tag", "error", "Admin $LoggedinID tried deleting a tag. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=tags";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
<script type="text/javascript">
window.setTimeout(function() {
    // Move to a new location
    window.location.href = "/admin/?page=tags";
}, 2500);
</script>
<?php
        break;
    case 'support':
        $supportid = mysqli_real_escape_string($dbConnection, $_POST['supportid']);

        $sql2 = "DELETE FROM support WHERE `support-id`='$supportid'";
        $result2 = mysqli_query($dbConnection, $sql2);

        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Support ticket successvol verwijderd";
            echo "</div>";
            Customlog("Delete-support", "log", "Admin $LoggedinID successfully deleted a support ticket $tagid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=support";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Support ticket kon niet verwijderd worden.";
            echo "</div>";
            Customlog("Delete-support", "error", "Admin $LoggedinID tried deleting a support ticket. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=support";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=support";
        }, 2500);
        </script>
        <?php
        break;
    case 'votes':
        $voteid= mysqli_real_escape_string($dbConnection, $_POST['voteid']);

        $sql2 = "DELETE FROM upvote WHERE `upvote-id`='$voteid'";
        $result2 = mysqli_query($dbConnection, $sql2);
        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Vote successvol verwijderd";
            echo "</div>";
            Customlog("Delete-Vote", "log", "Admin $LoggedinID successfully deleted a support ticket $tagid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=votes";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Vote kon niet verwijderd worden.";
            echo "</div>";
            Customlog("Delete-Vote", "error", "Admin $LoggedinID tried deleting a support ticket. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=votes";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=votes";
        }, 2500);
        </script>
        <?php
        break;
    case 'report1':
        $reportid= mysqli_real_escape_string($dbConnection, $_POST['reportid']);

        $sql2 = "DELETE FROM `comment-report` WHERE `report-id`='$reportid'";
        $result2 = mysqli_query($dbConnection, $sql2);
        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Report-comment successvol verwijderd";
            echo "</div>";
            Customlog("Delete-reportcomment", "log", "Admin $LoggedinID successfully deleted a reportcomment $tagid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=reported";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Report-comment kon niet verwijderd worden.";
            echo "</div>";
            Customlog("Delete-reportcomment", "error", "Admin $LoggedinID tried deleting a reportcomment. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=reported";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=reported";
        }, 2500);
        </script>
        <?php
        break;
    case 'report2':
        $reportid= mysqli_real_escape_string($dbConnection, $_POST['reportid']);

        $sql2 = "DELETE FROM `meme-report` WHERE `report-id`='$reportid'";
        $result2 = mysqli_query($dbConnection, $sql2);
        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Report-meme successvol verwijderd";
            echo "</div>";
            Customlog("Delete-reportmeme", "log", "Admin $LoggedinID successfully deleted a reportmeme $tagid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=reported";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Report-meme kon niet verwijderd worden.";
            echo "</div>";
            Customlog("Delete-reportmeme", "error", "Admin $LoggedinID tried deleting a reportmeme. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=reported";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=reported";
        }, 2500);
        </script>
        <?php
        break;
    case 'comments':
        $commentid= mysqli_real_escape_string($dbConnection, $_POST['commentid']);

        $sql2 = "DELETE FROM `comment` WHERE `comment-id`='$commentid'";
        $result2 = mysqli_query($dbConnection, $sql2);
        // Check if query succeeded
        if ($result2) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Comment successvol verwijderd";
            echo "</div>";
            Customlog("Delete-Comment", "log", "Admin $LoggedinID successfully deleted a Comment $tagid.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=comments";
            }, 2500);
            </script>
            <?php
            break;
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Comment kon niet verwijderd worden.";
            echo "</div>";
            Customlog("Delete-Comment", "error", "Admin $LoggedinID tried deleting a Comment. The query failed.");
            ?>
            <script type="text/javascript">
            window.setTimeout(function() {
                // Move to a new location
                window.location.href = "/admin/?page=comments";
            }, 2500);
            </script>
            <?php
            break;
        }
        ?>
        <script type="text/javascript">
        window.setTimeout(function() {
            // Move to a new location
            window.location.href = "/admin/?page=comments";
        }, 2500);
        </script>
        <?php
        break;
}

?>