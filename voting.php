<html>
  <head>
    <!-- Edit the pagename only -->
    <title>HBO-Memes - PAGENAME</title>
    <?php require('func.header.php'); ?>
  </head>

  <body>

  <?php
    $memeid = mysqli_real_escape_string($dbConnection, $_POST['memeid']);
    $user = mysqli_real_escape_string($dbConnection, $_POST['user']);
    $soort = mysqli_real_escape_string($dbConnection, $_POST['soort']);

        // Check if user already voted
            $sql = "SELECT * FROM upvote WHERE `meme-ID`='$memeid' AND `user-id`='$user' LIMIT 1";
            $result = mysqli_query($dbConnection, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // A vote already exist, delete it!
                $sql2 = "DELETE FROM upvote WHERE `meme-ID`='$memeid' AND `user-id`='$user' LIMIT 1";
                $result2 = mysqli_query($dbConnection, $sql2);
            }
        // Insert the vote
        $sql3 = "INSERT INTO `upvote`(`meme-ID`, `user-ID`, `soort`) VALUES ('$memeid','$user','$soort')";
        $result3 = mysqli_query($dbConnection, $sql3);

        if (!$result3) {
            Customlog("Upvoting", "error", "Something couldn't be updated. Info: (MemeID: $memeid UserID: $user Soort: $soort )");
        }
?>

  </body>

  <footer>
    <?php require('func.footer.php'); ?>
  </footer>
</html>
