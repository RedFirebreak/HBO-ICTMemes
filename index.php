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
                  
                  if ($result->num_rows > 0) { // This will also happen if the user is not logged in.
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          $memelocation = "."; // to make pathing variable from the homepage
                          $memeid  = $row["meme-ID"];
                          $memetitle  = $row["meme-titel"];
                          $memeuser  = $row["user-ID"];
                          $memedate  = $row["datum"];
                          $memelocation  .= $row["locatie"]; 
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
                                <?php
                                    if (file_exists($memelocation)) {
                                      echo "<a href='/meme/?id=$memeid'><img src='$memelocation'class='memeimage rounded mx-auto d-block' alt='...'></a>";
                                  } else {
                                      echo "<div class='alert alert-danger' role='alert'>";
                                      echo "De afbeelding kon helaas niet gevonden worden.</div>";
                                      Customlog("Home-memeimage", "error", "The homepage found an image that does not exist!(ID: $memeid, location: $memelocation, user: $memeuser, Date: $memedate )");
                                  }

                                    ?>
                            </div>

                            <!-- Load the extra info part -->
                            <div class="col-md-4 divmemeinfo">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="rounded img-thumbnail user-thumbnail" alt="Userpic" src="<?php echo $memeuserpic?>" />
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
                                    <div style="min-height: 200px;"class="col-md-12">
                                        <div class="d-none d-md-block">
                                            <!-- Hide on smaller devices -->
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

                                        $topcommentinhoud = htmlspecialchars($topcommentinhoud);
                                      
                                        echo "<p class='oneline' style='font-size: 1.2rem; margin: 1px 0;'>$topcommentusername:</p>";
                                        echo "<p class='top-comment' style='font-size: 1.4rem;''>$topcommentinhoud</p>";
                                      }
                                      ?>

                                        </div>

                                        <a class="btn btn-primary" style="color:#FFF;"
                                            href="/meme/?id=<?php echo $memeid?>">Comments</a>
                                    </div>

                                    <div class="memereport col-md-12 text-center">
                                      <hr>
                                        <div class="row">
                                          <div class="col-md-4">
                                          <a style="color: #FFF" href="##"><i class="fas fa-chevron-up"></i></a>
                                          </div>

                                          <div class="col-md-4">
                                          <a style="color: #FFF" href="##"><i class="fas fa-chevron-down"></i></a>
                                          </div>

                                          <div class="col-md-4">
                                          <i data-toggle="modal" data-target="#<?php echo $memeid ?>Modal" class="fas fa-dumpster"></i>
                                          </div>

                                          <div class="modal fade" id="<?php echo $memeid ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $memeid ?>ModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title" id="<?php echo $memeid ?>ModalLabel">Rapporteer meme: <?php echo $memetitle?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">

                                              <form>
                                                <div class="form-row align-items-center">
                                                  <div class="col-auto my-1">
                                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <?php
                                                      $sqlovertredingen = "SELECT * FROM overtredingen ORDER by overtreding ASC;";
                                                      $resultovertredingen = mysqli_query($dbConnection, $sqlovertredingen);
                                                      
                                                      if (mysqli_num_rows($resultovertredingen) > 0) {
                                                          // output data of each row
                                                          while($rowovertredingen = mysqli_fetch_assoc($resultovertredingen)) {
                                                            $overtreding = $rowovertredingen["overtreding"];
                                                            echo "<option value='$overtreding'>$overtreding</option>";
                                                          }
                                                      } else {
                                                          echo "0 results";
                                                      }
                                                    ?>
                                                    </select>
                                                  </div>
                                                  <div class="col-auto my-1">
                                                    <div class="custom-control custom-checkbox mr-sm-2">
                                                      <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                      <label class="custom-control-label" for="customControlAutosizing">Kies een overtreding</label>
                                                    </div>
                                                  </div>
                                                </div>
                                              

                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger">Rapporteer</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End meme card -->

                        <?php
                      }
                  } else {
                      ?>
                        <p>
                            Welkom! Wij zijn HBO-ICTMemes. Ons doel is om zo veel mogelijk memes aan te bieden aan
                            studenten, voor studenten. <br>
                            <b>Om ons grote aanbod aan memes te kunnen zien moet er ingelogd worden.</b>
                        </p>


                        <?php
                  }
                ?>

                    </div>
                    <div class="col-md-3">
                        <div class="sticky-top" style="top: 82px;">
                            <h1>Sticky-Info</h1>
                            <p>Tags, uploads, info and other stuff will be displayed here. Come back later when we have
                                actually done stuff!</p>
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