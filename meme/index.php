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
      <div class="container">
        <div class="row">
          <div class="col-md-12">

          <?php
          if($Loggedin) {
            ?>
            <div class="row">
              <div class="col-md-9">

                  <?php
                    // make query based on logged in userschool
                    $cleanid= mysqli_real_escape_string($dbConnection, $_GET['id']);

                    $sql = "SELECT * FROM meme WHERE `meme-ID`='$cleanid' LIMIT 1;";

                    $result = $dbConnection->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          $memeid  = $row["meme-ID"];
                          $memetitle  = $row["meme-titel"];
                          $memeuser  = $row["user-ID"];
                          $memedate  = $row["datum"];
                          $memelocation  = $row["locatie"];
                          $memeschool  = $row["school"];

                          $query = "SELECT username, profile_picture, userrole, schoolnaam FROM user WHERE `user-ID`='$memeuser'";
                          $results = mysqli_query($dbConnection, $query);
                          $row2 = mysqli_fetch_assoc($results);
                          
                          $memeusername = $row2["username"];
                          $memeuserpic = $row2["profile_picture"];
                          $memeuserrole = $row2["userrole"];
                          $memeuserschool = $row2["schoolnaam"];
                        }
                          ?>

                          <!-- Meme- cards -->
                          <div class="row memecards">
                            <!-- Load the meme - part -->
                            <div class="col-md-12">
                              <h3><b><?php echo $memetitle?></b></h3>
                              <hr>
                              <a href="/meme/?id=<?php echo $memeid?>">
                                <img src="<?php echo $memelocation?>" class="rounded mx-auto d-block" alt="...">
                                <br>
                              </a>
                            

                            <!-- Load the extra info part -->

                            <div class="row">
                              <div class="col-md-12">
                                      <hr>
                                        <p style="margin: 1px 0;"><b>Comments:<br><br></b></p>

                                        <?php
                                        // Check if someone commented

                                        $sql = "SELECT * FROM comments WHERE `meme-ID`= '$memeid' ORDER by `datum` ASC";
                                        $result = $dbConnection->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {

                                              $commentinhoud = $row['inhoud'];
                                              $commentuser = $row['user-ID'];

                                              // Get username and userpiclocation
                                              $query = "SELECT username, profile_picture FROM user WHERE `user-ID`='$commentuser'";
                                              $results = mysqli_query($dbConnection, $query);
                                              $row2 = mysqli_fetch_assoc($results);

                                              $commentusername = $row2['username'];
                                              $commentpfpic = $row2['profile_picture'];

                                              echo"<div class='row'>";
                                              echo"<div class='col-md-2'>";
                                              echo"<img alt='userpic' src='$commentpfpic' class='rounded img-thumbnail user-thumbnail' />";
                                              echo"</div>";
                                              echo"<div class='col-md-10'>";
                                              echo"<b>$commentusername</b>";
                                              echo "<p class='top-comment' style='font-size: 1.4rem;''>". htmlspecialchars($commentinhoud) ."</p>";
                                              echo"</div>";
                                              echo"</div>";
                                              echo "<hr>";

                                            }
                                        } else {
                                            echo "<p class='top-comment' style='font-size: 1.4rem;'>Niemand heeft een comment geplaatst. Wees de eerste!</p>";
                                          }
                                        }
                                        ?>
                                    </div>
                                  </div>
                              </div>
                          </div>
                          <!-- End meme card -->
                          <div class="row memecards">
                              <div class="col-md-12">
                                <form action="func.sendcomment.php" method="post">
                                  Laat een bericht achter!:<br>
                                  <input style="background-color: #2b3640; color: white; width: 100%;" type="text" name="comment" required><br><br>
                                  <input type="hidden" name="memeid" value="<?php echo "$cleanid"?>" required>
                                  <input type="hidden" name="userid" value="<?php echo "$LoggedinID"?>" required>
                                  <input class="btn btn-primary" type="submit" value="Submit">
                                </form>
                              </div>
                          </div>


              </div>
              <div class="col-md-3">
                <div class="sticky-top" style="top: 82px;">
                  <h1>User-info</h1>
                  <img class="rounded img-thumbnail user-thumbnail" alt="Userpic" src="<?php echo $memeuserpic?>"/>
                  <p style="word-wrap:break-word">
                      <?php
                      
                      // Echo userinfo of the meme
                        echo $memeusername . '<br>';
                        if ($memeuserrole == 'admin') {echo "Admin <br>";}
                        if ($memeuserrole == 'uber-admin') {echo "Hoofd-Admin <br>";}
                        echo $memeuserschool . '<br>';
                        echo "Posted: " . $memedate;
                      ?>
                    </p>
                </div> 
              </div>
            </div>
            <?php
              } else {
              //Nobody is logged in.
              echo "<div class='alert alert-danger' role='alert'>";
              echo "Je moet ingelogd zijn om deze pagina te kunnen bekijken.";
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