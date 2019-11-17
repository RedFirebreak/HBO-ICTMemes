<!DOCTYPE html>
<html lang="en">

<head>
    <title>HBO-ICTMemes</title>
    <?php
      require "func.header.php";
    ?>
</head>

<body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Search</h1>
            <?php
            if ($Loggedin) {
              echo "<p>Hallo $LoggedinUsername, jouw zoekresultaat laat ook resultaten van de $LoggedinSchool zien!";
            } else {
              echo "<p>Hallo gebruiker! Log in om meer zoekresultaten te zien van jouw school!";
            }
        if (!empty($_POST['search'])) {
          $search = mysqli_real_escape_string($dbConnection, $_POST['search']);
        } else {
          if (!empty($_GET['search'])) {
            $search = mysqli_real_escape_string($dbConnection, $_GET['search']);
          } else {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Geen opdracht gegeven. Klaar!";
            echo "</div>";
          }
        }
        if ($search) {
          $nietgevonden = 0;
          // Tags
          if ($Loggedin) {
            // For logged in users
            $sql = "SELECT tagnaam t FROM tags WHERE tagnaam like '%$search%' ORDER by tagnaam ASC;";
          } else {
            // For not logged in users
            $sql = "SELECT tagnaam t FROM tags WHERE tagnaam like '%$search%' ORDER by tagnaam ASC;";
          }

            $result = $dbConnection->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                $taggevonden = true;
                echo "<h1>De volgende tags zijn gevonden:<br></h1>";
                while($row = $result->fetch_assoc()) {
                $tag = $row["t"];
                    echo "Tag: $tag <br>";
                }
                echo "<br>";
            } else {
                $taggevonden = false;
                $nietgevonden++;
            }
          // Meme met tags
          if ($Loggedin) {
            // Query for logged in users
            $sql2 = "SELECT t.`tagnaam` tagnaam, m.`meme-titel` titel, m.`meme-id` id, m.`locatie` loc
            FROM memetag mt
            JOIN tags t on mt.`tag-id` = t.`tag-id`
            JOIN meme m on mt.`meme-id` = m.`meme-id` 
            WHERE t.tagnaam like '%$search%' AND m.`school`='geen' OR
            t.tagnaam like '%$search%' AND m.`school`='$LoggedinSchool'
            ORDER by m.`meme-id` ASC;";
            } else {
              // Query for logged out users
              $sql2 = "SELECT t.`tagnaam` tagnaam, m.`meme-titel` titel, m.`meme-id` id, m.`locatie` loc
              FROM memetag mt
              JOIN tags t on mt.`tag-id` = t.`tag-id`
              JOIN meme m on mt.`meme-id` = m.`meme-id` 
              WHERE t.tagnaam like '%$search%' AND m.`school`='geen'
              ORDER by m.`meme-id` ASC;";
            }

            $result2 = $dbConnection->query($sql2);
            
            if ($result2->num_rows > 0) {
                // output data of each row
                $memetaggevonden = true;
                echo "<h1>De volgende memes zijn gevonden met de tag:<br></h1>";
                while($row2 = $result2->fetch_assoc()) {
                $tagnaam = $row2["tagnaam"];
                $memetitle = $row2["titel"];
                $memeid = $row2["id"];
                $memelocation = $row2["loc"];
                    echo "<a href='/meme/?id=$memeid'><img class='rounded img-thumbnail user-thumbnail memeaccountimage' alt='$memetitle'src='/storage/meme/loading.gif' data-src='$memelocation'/></a>";
                    echo "   ";
                }
                echo "<br>";
            } else {
              $memetaggevonden = false;
              $nietgevonden++;
            }
          // Meme - Titelnaam
          if ($Loggedin) {
            // Query for logged in users
            $sql3 = "SELECT `meme-titel` titel, `meme-id` id, `locatie` loc
            FROM meme
            WHERE `meme-titel` like '%$search%' AND `school`='geen' OR
            `meme-titel` like '%$search%' AND `school`='$LoggedinSchool'
            ORDER by `meme-id` ASC;";
          } else {
            // Query for logged out users
            $sql3 = "SELECT `meme-titel` titel, `meme-id` id, `locatie` loc
            FROM meme
            WHERE `meme-titel` like '%$search%' AND `school`='geen'
            ORDER by `meme-id` ASC;";
          }
            $result3= $dbConnection->query($sql3);
            if ($result3->num_rows > 0) {
              echo "<h1>De volgende memes hebben '$search' in de titel:<br></h1>";
              $memetitelgevonden = true;
                // output data of each row
                while($row3 = $result3->fetch_assoc()) {
                  $memetitle = $row3["titel"];
                  $memeid = $row3["id"];
                  $memelocation = $row3["loc"];
                    echo "<h2>Memetitel:</h2> $memetitle<br>";
                    echo "<a href='/meme/?id=$memeid'><img class='rounded img-thumbnail user-thumbnail memeaccountimage' alt='$memetitle'src='/storage/meme/loading.gif' data-src='$memelocation'/></a>";
                    echo "<br>";
                }
            } else {
              $memetitelgevonden = false;
              $nietgevonden++;
            }
          // Users - username
            $sql4 = "SELECT username, `profile_picture` FROM user where username like '%$search%' ORDER by username ASC;";
            $result4 = $dbConnection->query($sql4);
            
            if ($result4->num_rows > 0) {
                // output data of each row
                $usernamegevonden = true;
                echo "<h1>De volgende accounts zijn gevonden met '$search' in de username:<br></h1>";
                while($row4 = $result4->fetch_assoc()) {
                  $memeusername = $row4["username"];
                  $pflocation = $row4["profile_picture"];
                echo "<h2>Username:</h2> $memeusername<br>";
                echo "<a href='/account/?account=$memeusername'><img class='rounded img-thumbnail user-thumbnail memeaccountimage' alt='$memeusername'src='/storage/meme/loading.gif' data-src='$pflocation'/></a>";
                echo "<br>";
                }
            } else {
              $usernamegevonden = false;
              $nietgevonden++;
            }
          // Comment 
          if ($Loggedin) {
            // Query for logged in users
            $sql5 = "SELECT c.inhoud, c.`meme-id`
            FROM comments C
            JOIN meme m on c.`meme-id` = m.`meme-id` 
            where inhoud like '%$search%' AND m.`school`='geen'; or
            inhoud like '%$search%' AND m.`school`='$LoggedinSchool';
            ORDER by datum ASC;";
          } else {
            // Query for logged in users
            $sql5 = "SELECT c.inhoud, c.`meme-id`
            FROM comments C
            JOIN meme m on c.`meme-id` = m.`meme-id` 
            where inhoud like '%$search%' AND m.`school`='geen';
            ORDER by datum ASC;";
          }

            $result5 = $dbConnection->query($sql5);  
            if ($result5->num_rows > 0) {
                // output data of each row
                $commentgevonden = true;
                echo "<h1>De volgende comments zijn gevonden met '$search' in de inhoud:<br></h1>";
                while($row5 = $result5->fetch_assoc()) {
                $memeid = $row5["meme-id"];
                $inhoud= $row5["inhoud"];
                    echo "<p>Comment: $inhoud";
                    echo "<a class='btn btn-primary' href='/meme/?id=$memeid'>Naar post</a></p><br><br>";
                }
            } else {
              $commentgevonden = false;
              $nietgevonden++;
            }

            if ($nietgevonden == 5) {
              echo "<div class='alert alert-danger' role='alert'>";
              echo "De zoekopdracht is helaas niet gevonden. Probeer het opnieuw.";
              echo "</div>";
            }
        }
        ?>

        </div>
    </div>

    <?php
    require "func.footer.php";
  ?>

</body>

</html>