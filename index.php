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
                var_dump($_SESSION);
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
                    $sql = "SELECT * FROM meme WHERE `school`='$LoggedinSchool' OR `school`='Geen' ORDER by `meme-ID` DESC;";
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
                                <h3><b><?php 
                                echo "$memetitle </b>";

                                // Check if it was posted for a school
                                if ($memeschool == 'geen') {
                                    // Everyone can see this!
                                } else {
                                    echo " -- $memeschool";
                                }
                                
                                ?></h3>
                                <hr>
                                <?php
                                    if (file_exists($memelocation)) {
                                      echo "<a href='/meme/?id=$memeid'><img src='/storage/meme/loading.gif' data-src='$memelocation'class='memeimage rounded mx-auto d-block' alt='...'></a>";
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
                                        <a href='/account/?account=<?php echo $memeusername?>'>
                                            <img class="rounded img-thumbnail user-thumbnail" alt="Userpic"
                                                src="<?php echo $memeuserpic?>" />
                                        </a>
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
                                        <?php
                                        // Get tagnaam to display
                                        $querytagnaam = "SELECT t.tagnaam tag
                                                          from tags t
                                                          join memetag mt on t.`tag-ID`= mt.`tag-ID`
                                                          where mt.`meme-id`='$memeid'";
                                        $resultstagnaam = mysqli_query($dbConnection, $querytagnaam);
                                        $rowtagnaam = mysqli_fetch_assoc($resultstagnaam);
                                        $rowtagnaam = $rowtagnaam['tag'];
                                        echo "<h4>Tag: $rowtagnaam</h4"
                                        ?>
                                    </div>
                                </div>

                                <div style="min-height: 200px;" class="col-md-12">
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

                                    <p></p>
                                    <script type="text/javascript">
                                    // Upvote!
                                    $(document).ready(function() {
                                        $("#<?php echo $memeid ?>upvote").click(function() {

                                            if ($('#<?php echo $memeid ?>upvote').hasClass("upvote")) {
                                                //alert('hi')
                                            } else {
                                                // Calculate a new value, if the div has class
                                                $('#<?php echo $memeid ?>upvotespan').html(parseInt($(
                                                        '#<?php echo $memeid ?>upvotespan')
                                                    .html(), 10) + 1)

                                                if ($('#<?php echo $memeid ?>downvote').hasClass(
                                                        "downvote"
                                                    )) { // Only -1 if it has been downvoted
                                                    $("#<?php echo $memeid ?>downvotespan").text($(
                                                            "#<?php echo $memeid ?>downvotespan")
                                                        .text() - 1);
                                                }
                                                // Change colors 
                                                $('#<?php echo $memeid ?>upvote').addClass('upvote');
                                                $('#<?php echo $memeid ?>downvote').removeClass(
                                                    'downvote');


                                                $.ajax({
                                                    type: 'POST',
                                                    url: '/voting.php',
                                                    data: {
                                                        'memeid': '<?php echo $memeid ?>',
                                                        'user': '<?php echo $LoggedinID ?>',
                                                        'soort': 'upvote'
                                                    },
                                                    success: function(data) {
                                                        //alert(data);
                                                    }
                                                });
                                            }


                                        });
                                    });
                                    </script>
                                    <script type="text/javascript">
                                    // Downvote!
                                    $(document).ready(function() {
                                        $("#<?php echo $memeid ?>downvote").click(function() {

                                            if ($('#<?php echo $memeid ?>downvote').hasClass(
                                                    "downvote")) {
                                                //alert('hi')
                                            } else {
                                                // Calculate a new value, if the div has class
                                                $('#<?php echo $memeid ?>downvotespan').html(parseInt($(
                                                        '#<?php echo $memeid ?>downvotespan')
                                                    .html(), 10) + 1)
                                                if ($('#<?php echo $memeid ?>upvote').hasClass(
                                                        "upvote")) { // Only -1 if it has been upvoted
                                                    $("#<?php echo $memeid ?>upvotespan").text($(
                                                            "#<?php echo $memeid ?>upvotespan")
                                                        .text() - 1);
                                                }
                                                // Change colors
                                                $('#<?php echo $memeid ?>downvote').addClass(
                                                    'downvote');
                                                $('#<?php echo $memeid ?>upvote').removeClass('upvote');

                                                $.ajax({
                                                    type: 'POST',
                                                    url: '/voting.php',
                                                    data: {
                                                        'memeid': '<?php echo $memeid ?>',
                                                        'user': '<?php echo $LoggedinID ?>',
                                                        'soort': 'downvote'
                                                    },
                                                    success: function(data) {
                                                        //alert(data);
                                                    }
                                                });
                                            }
                                        });
                                    });
                                    </script>
                                    <hr>
                                    <div class="row">
                                        <?php
                                          // Check if the user voted on the post previously, 
                                          $hasvoted = "SELECT soort FROM upvote WHERE `meme-id`='$memeid' AND `user-id`='$LoggedinID' LIMIT 1";
                                          $votedresult = mysqli_query($dbConnection, $hasvoted);
                                          $ifvoted = mysqli_fetch_assoc($votedresult);
                                          if ($ifvoted) {
                                            $voteresult = $ifvoted['soort'];
                                            switch ($voteresult) {
                                              case 'upvote':
                                                  ?>
                                        <script type="text/javascript">
                                        // Upvote!
                                        $(document).ready(function() {
                                            $('#<?php echo $memeid ?>upvote').addClass('upvote');
                                        });
                                        </script>
                                        <?php
                                                  break;
                                              case 'downvote':
                                                ?>
                                        <script type="text/javascript">
                                        // Downvote!
                                        $(document).ready(function() {
                                            $('#<?php echo $memeid ?>downvote').addClass('downvote');
                                        });
                                        </script>
                                        <?php
                                              break;
                                          }
                                        }

                                          // also get the total amount of upvotes/downvotes
                                          $sqlamountupvote = "SELECT count(*) amount FROM upvote WHERE `meme-id`='$memeid' and `soort`='upvote'";
                                          $amountupvoteresult = mysqli_query($dbConnection, $sqlamountupvote);
                                          $amountupvote = mysqli_fetch_assoc($amountupvoteresult);
                                          $amountupvote = $amountupvote['amount'];

                                          $sqlamountdownvote = "SELECT count(*) amount FROM upvote WHERE `meme-id`='$memeid' and `soort`='downvote'";
                                          $amountdownvoteresult = mysqli_query($dbConnection, $sqlamountdownvote);
                                          $amountdownvote = mysqli_fetch_assoc($amountdownvoteresult);
                                          $amountdownvote = $amountdownvote['amount'];
                                          ?>

                                        <?php
                                        if ($Loggedin) {
                                            // If the user is logged in, show the vote/report buttons
                                        ?>
                                        <div class="col-md-4">
                                            <i id="<?php echo $memeid ?>upvote" class="fas fa-chevron-up"><span
                                                    id="<?php echo $memeid ?>upvotespan"
                                                    class="badge"><?php echo $amountupvote ?></span></i>

                                        </div>

                                        <div class="col-md-4">
                                            <i id="<?php echo $memeid ?>downvote" class="fas fa-chevron-down"><span
                                                    id="<?php echo $memeid ?>downvotespan"
                                                    class="badge"><?php echo $amountdownvote ?></span></i>
                                        </div>

                                        <div class="col-md-4">
                                            <i data-toggle="modal" data-target="#<?php echo $memeid ?>Modal"
                                                class="fas fa-dumpster"></i>
                                        </div>
                                        <?php
                                        } else {
                                            // if not, show a "log in to vote" button
                                        ?>
                                        <div class="col-md-12">
                                            <p>Log in om te stemmen!</p>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                
                                        <!-- Geef elke meme een eigen modal om te reported -->
                                        <div class="modal fade" id="<?php echo $memeid ?>Modal" tabindex="-1"
                                            role="dialog" aria-labelledby="<?php echo $memeid ?>ModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="<?php echo $memeid ?>ModalLabel">
                                                            Rapporteer meme: <?php echo $memetitle?></h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-row align-items-center">
                                                            <div class="col-auto my-1">
                                                                <label class="mr-sm-2 sr-only"
                                                                    for="inlineFormCustomSelect">Preference</label>
                                                                <p>Let op! Hiermee kan je een meme rapporteren voor
                                                                    verschillende rededenen. Niet de bedoeling? Klik dan
                                                                    op "sluiten"</p>
                                                                <h3>Meme: <?php echo $memetitle?></h3>
                                                                <label class="custom-control-label"
                                                                    for="customControlAutosizing">Kies een
                                                                    overtreding</label>

                                                                <form action="/report.php" method="post">
                                                                    <select name="overtreding"
                                                                        class="custom-select mr-sm-2"
                                                                        id="inlineFormCustomSelect">
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
                                                                    <br><br>

                                                                    <label class="custom-control-label"
                                                                        for="customControlAutosizing">Toevoeging</label>
                                                                    <input type="text" name="Toevoeging" required>
                                                                    <?php echo recaptchaform ();?>
                                                                    <input type="hidden" name="memeid"
                                                                        value="<?php echo $memeid ?>" required>
                                                                    <input type="hidden" name="loggedinID"
                                                                        value="<?php echo $LoggedinID ?>" required>
                                                                    <input type="hidden" name="meme" value="true"
                                                                        required>
                                                                    <input type="hidden" name="comment" value="false"
                                                                        required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Sluiten</button>
                                                        <button type="submit" class="btn btn-danger">Rapporteer</button>
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
                        Welkom! Wij zijn HBO-ICTMemes. Ons doel is om zo veel mogelijk memes aan te bieden voor
                        studenten, door studenten. <br>
                        <b>Om ons grote aanbod aan memes te kunnen zien moet er ingelogd worden.</b>
                    </p>


                    <?php
                  }
                ?>

                    </div>
                    <div class="col-md-3">
                        <div class="sticky-top" style="top: 82px;">
						<?php
							if ($Loggedin) {
								//queries voor info
								$query = "select count(*) aantal from meme where `user-ID`='$LoggedinID';";
								$result = $dbConnection->query($query);
								$memeaantal = mysqli_fetch_assoc($result)['aantal'];
								$sql = "select count(*) aantal from comments where `user-ID`='$LoggedinID';";
								$result = $dbConnection->query($sql);
								$commentaantal = mysqli_fetch_assoc($result)['aantal'];
								if (empty($memeaantal)) {$memeaantal='0';}
								if (empty($commentaantal)) {$commentaantal='0';}
								
								//tekst
								echo "
								<p>
								<b>Welkom ".$LoggedinUsername."!</b><br>
								Je hebt ".$memeaantal." memes geupload.<br>
								Je hebt ".$commentaantal." comments geplaatst.
								</p>";
							} else {
                                echo "<h1>Goedendag!</h1>
								<p>
                                Log in om school-specifieke memes te zien en zelf memes toe te voegen aan de collectie.<br>
                                <a href='account/login.php'>Klik hier om naar de inlogpagina te gaan</a>
								</p>";
                            }
							
						?>
                        </div>
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