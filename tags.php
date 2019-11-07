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
        <h1 class="display-3">Tags</h1>
        <p>Tagspage</p>

      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Stuff n' Things</h2>
                <p>
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
                  ?>
                </p>
            </div>

        </div>
    </div>

  <?php
    require "func.footer.php";
  ?>

      </body>
</html>
