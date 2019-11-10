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
        <p>Welkom op HBO-ICTMemes 
        <?php 
          if ($LoggedinUserrole == "uber-admin") {
            echo "<br>Hallo uber-admin! Je kunt alle memes zien van alle scholen.";
          }
        ?></p>

      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-9">

                <?php
                  // make query based on logged in userschool
                  if ($LoggedinUserrole == "uber-admin") {
                    $sql = "SELECT * FROM meme ORDER by `meme-ID` DESC;";
                  } else {
                    $sql = "SELECT * FROM meme WHERE `school`='$LoggedinSchool' ORDER by `meme-ID` DESC;";
                  }
    
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
                        ?>
                        <!-- Meme- cards -->
                        <div class="row memecards">
                          <!-- Load the meme - part -->
                          <div class="col-md-8 divmemeimage">
                            <h3><b><?php echo $memetitle?></b></h3>
                            <hr>
                            <a href="/meme/?id=<?php echo $memeid?>">
                              <img src="<?php echo $memelocation?>" class="memeimage rounded mx-auto d-block" alt="...">
                            </a>
                          </div>
          
                          <!-- Load the extra info part -->
                          <div class="col-md-4 divmemeinfo">
                           <div class="row">
                              <div class="col-md-4">
                                <img class="rounded img-thumbnail user-thumbnail" alt="Userpic" src="<?php echo $memeuserpic?>"/>
                              </div>
                              <div class="col-md-8">
                                <p style="word-wrap:break-word">
                                <?php
                                  // Echo userinfo of the meme
                                  echo $memeusername . '<br>';
                                  if ($memeuserrole == 'admin') {echo "Admin <br>";}
                                  if ($memeuserrole == 'uber-admin') {echo "Hoofd-Admin <br>";}
                                  echo $memeuserschool . '<br>';
                                  echo "Posted: " . $memedate;
                                ?>
                              </div>
                                <div class="col-md-12">
                                  <div class="d-none d-md-block"> <!-- Hide on smaller devices -->
                                    <hr>
                                      <p style="margin: 1px 0;"><b>Top Comment:</b></p>

                                      <?php
                                      // Check if someone commented
                                      $query = "SELECT * FROM comments WHERE `meme-ID`= '$memeid' ORDER by `datum` ASC LIMIT 1";
                                      $results = mysqli_query($dbConnection, $query);
                                      $row2 = mysqli_fetch_assoc($results);

                                      if (empty($row2)) {
                                        echo "<p class='top-comment' style='font-size: 1.4rem;'>Niemand heeft een comment geplaatst. Wees de eerste!</p>";
                                      } else {
                                        // Someone commented, get their userinfo
                                        $topcommentuser = $row2['user-ID'];
                                        $topcommentinhoud =$row2['inhoud'];
                                        $querytopcomment = "SELECT username FROM user WHERE `user-ID`='$topcommentuser'";
                                        $resultstopcomment = mysqli_query($dbConnection, $querytopcomment);
                                        $rowtopcomment = mysqli_fetch_assoc($resultstopcomment);
                                        $topcommentusername = $rowtopcomment['username'];
                                      
                                        echo "<p class='oneline' style='font-size: 1.2rem; margin: 1px 0;'>$topcommentusername:</p>";
                                        echo "<p class='top-comment' style='font-size: 1.4rem;''>". htmlspecialchars($topcommentinhoud) ."</p>";
                                      }
                                      ?>

                                    </div>

                                    <a class="btn btn-primary" style="color:#FFF;" href="/meme/?id=<?php echo $memeid?>">Comments</a>
                                </div>
                            </div>
                            <!-- Voting part  WIP
                            <div class="row text-center d-flex align-items-end">
                              <div class="col-md-6">
                                <span><i class="fas fa-chevron-up fa-2x"></i></span>
                              </div>
                              <div class="col-md-6">
                                <span><i class="center fas fa-chevron-down fa-2x"></i></span>
                              </div>
                             </div> -->
                             
                          </div>
                        </div>
                        <!-- End meme card -->

                        <?php
                      }
                  } else {
                      ?>
                      <p>
                      Welkom! Wij zijn HBO-ICTMemes. Ons doel is om zo veel mogelijk memes aan te bieden aan studenten, voor studenten. <br>
                      <b>Om ons grote aanbod aan memes te kunnen zien moet er ingelogd worden.</b>
                      </p>


                      <?php
                    
                  }
                ?>

            </div>
            <div class="col-md-3">
              <div class="sticky-top" style="top: 82px;">
                <h1>Sticky-Info</h1>
                <p>Tags, uploads, info and other stuff will be displayed here. Come back later when we have actually done stuff!</p>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
</div>
  <?php
    require "func.footer.php";
  ?>

      </body>
</html>
