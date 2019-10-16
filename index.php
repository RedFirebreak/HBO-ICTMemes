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
        <h1 class="display-3">HBO-ICTMemes</h1>
        <p>Welkom op HBO-ICTMemes.nl</p>

      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
            <h2>Memes here!</h2>
            <p>"Insert epic meme image"</p>
            <br>
            <br>
            <br>

            <?php
            echo "<br>";
            $sql = "SELECT tagnaam t FROM tags ORDER by 1;";
            $result = $dbConnection->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Tag: " . $row["t"]. "<br>";
                }
            } else {
                echo "0 results";
            }
            /*
              $query = "SELECT tagnaam t FROM tags ORDER by 1;";
              $result_set = mysqli_query($dbConnection, $query);
              mysqli_free_result($result_set);

              var_dump($result_set); 

              while($record = mysqli_fetch_assoc($result_set)){
                $tagnaam = $record['t'];
                echo "<strong> Omschrijving: </strong> {$tagnaam},<strong><br/>";
              }
            */
            ?>

        </div>

        <div class="col-md-2" style="background-color: #d3d3d3;border-radius: 25px;">
            <h2>Meme info</h2>
            <p>Info about the meme will be displayed here</p>
        </div>

        <div class="col-md-3">
            <h2>Sticky-Info</h2>
            <p>Tags, uploads, info and other stuff will be displayed here. Come back later when we have actually done stuff!</p>
        </div>
      </div>
    </div>

  <?php
    require "func.footer.php";
  ?>

      </body>
</html>
