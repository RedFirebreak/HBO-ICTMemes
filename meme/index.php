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
                if(!empty($_GET)){
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
                          $memelocation = "..";
                          $memelocation  .= $row["locatie"];
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
                                    <?php
                                    if (file_exists($memelocation)) {
                                      echo "<a href='/meme/?id=$memeid'><img src='$memelocation'class='memepageimage rounded mx-auto d-block' alt='...'></a>";
                                  } else {
                                      echo "<div class='alert alert-danger' role='alert'>";
                                      echo "De afbeelding kon helaas niet gevonden worden.</div>";
                                      Customlog("Home-memeimage", "error", "The homepage found an image that does not exist!(ID: $memeid, location: $memelocation, user: $memeuser, Date: $memedate )");
                                  }
                                    ?>
                                    <!-- voting part -->
                                    <div class="col-md-12 text-center">
                                    <script type="text/javascript"> // Upvote!
                                        $(document).ready(function(){
                                          $("#<?php echo $memeid ?>upvote").click(function(){

                                            if ( $( '#<?php echo $memeid ?>upvote' ).hasClass( "upvote" ) ) {
                                              //alert('hi')
                                                  } else {
                                            // Calculate a new value, if the div has class
                                            $('#<?php echo $memeid ?>upvotespan').html(parseInt($('#<?php echo $memeid ?>upvotespan').html(), 10)+1)

                                            if ( $( '#<?php echo $memeid ?>downvote' ).hasClass( "downvote" ) ) { // Only -1 if it has been downvoted
                                            $("#<?php echo $memeid ?>downvotespan").text($("#<?php echo $memeid ?>downvotespan").text()-1);
                                            }
                                            // Change colors 
                                            $( '#<?php echo $memeid ?>upvote' ).addClass( 'upvote' );
                                            $( '#<?php echo $memeid ?>downvote' ).removeClass( 'downvote' );

                                                  
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
                                    <script type="text/javascript"> // Downvote!
                                        $(document).ready(function(){
                                          $("#<?php echo $memeid ?>downvote").click(function(){

                                            if ( $( '#<?php echo $memeid ?>downvote' ).hasClass( "downvote" ) ) {
                                              //alert('hi')
                                                  } else {
                                            // Calculate a new value, if the div has class
                                            $('#<?php echo $memeid ?>downvotespan').html(parseInt($('#<?php echo $memeid ?>downvotespan').html(), 10)+1)
                                            if ( $( '#<?php echo $memeid ?>upvote' ).hasClass( "upvote" ) ) { // Only -1 if it has been upvoted
                                            $("#<?php echo $memeid ?>upvotespan").text($("#<?php echo $memeid ?>upvotespan").text()-1);
                                            }
                                            // Change colors
                                            $( '#<?php echo $memeid ?>downvote' ).addClass( 'downvote' );
                                            $( '#<?php echo $memeid ?>upvote' ).removeClass( 'upvote' );

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
                                                  <script type="text/javascript"> // Upvote!
                                                      $(document).ready(function(){
                                                          $( '#<?php echo $memeid ?>upvote' ).addClass( 'upvote' );
                                                      });
                                                  </script>
                                                <?php
                                                break;
                                            case 'downvote':
                                              ?>
                                              <script type="text/javascript"> // Downvote!
                                                  $(document).ready(function(){
                                                      $( '#<?php echo $memeid ?>downvote' ).addClass( 'downvote' );
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
                                        <i id="<?php echo $memeid ?>upvote" class="fas fa-chevron-up"><span id="<?php echo $memeid ?>upvotespan" class="badge"><?php echo $amountupvote ?></span></i>
                                        
                                        </div>

                                        <div class="col-md-4">
                                        <i id="<?php echo $memeid ?>downvote" class="fas fa-chevron-down"><span id="<?php echo $memeid ?>downvotespan" class="badge"><?php echo $amountdownvote ?></span></i>
                                        </div>

                                        <div class="col-md-4">
                                        <i data-toggle="modal" data-target="#<?php echo $memeid ?>Modal" class="fas fa-dumpster"></i>
                                        </div>

                                        <?php
                                        } else {
                                            // if not, show a "log in to vote" button
                                        ?>
                                        <div class="col-md-12">
                                            <p>Log in om te stemmen of een reactie achter te laten!</p>
                                        </div>
                                        <?php
                                        }
                                        ?>

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

                                              <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                  <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                  <p>Let op! Hiermee kan je een meme rapporteren voor verschillende rededenen. Niet de bedoeling? Klik dan op "sluiten"</p>
                                                  <h3>Meme: <?php echo $memetitle?></h3>
                                                  <label class="custom-control-label" for="customControlAutosizing">Kies een overtreding</label>
                                                  
                                                  <form action="/report.php" method="post">
                                                  <select name="overtreding" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
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

                                                  <label class="custom-control-label" for="customControlAutosizing">Toevoeging</label>
                                                  <input type="text" name="Toevoeging" required>
                                                  <?php echo recaptchaform ();?>
                                                  <input type="hidden" name="memeid" value="<?php echo $memeid ?>" required>
                                                  <input type="hidden" name="loggedinID" value="<?php echo $LoggedinID ?>" required>
                                                  <input type="hidden" name="meme" value="true" required>
                                                  <input type="hidden" name="comment" value="false" required>
                                                </div>
                                              </div>
                                          
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                              <button type="submit" class="btn btn-danger">Rapporteer</button>
                                              </form>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
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
                                              $commentid = $row['comment-ID'];

                                              // Get username and userpiclocation
                                              $query = "SELECT username, profile_picture, userrole FROM user WHERE `user-ID`='$commentuser'";
                                              $results = mysqli_query($dbConnection, $query);
                                              $row2 = mysqli_fetch_assoc($results);

                                              $commentusername = $row2['username'];
                                              $commentuserrole = $row2['userrole'];
                                              $commentpfpic = $row2['profile_picture'];

                                              echo"<div class='row'>";
                                              echo"<div class='col-md-2'>";
                                              echo"<a href='/account/?account=$commentusername'><img alt='userpic' src='$commentpfpic' class='rounded img-thumbnail user-thumbnail' /><a>";
                                              echo"</div>";
                                              echo"<div class='col-md-10'>";
                                              echo"<b>$commentusername </b>";
                                              if ($commentuserrole == 'admin') {echo " (Admin) <br>";}
                                              if ($commentuserrole == 'uber-admin') {echo "Hoofd-Admin <br>";}
                                              echo "<p class='memecomment' style='font-size: 1.4rem;''>". htmlspecialchars($commentinhoud) ."</p>";
                                              ?>

                                        <div class="memereport col-md-12 text-center">
                                        <div class="row">
                                            <div class="col-md-9">
                                          </div>
                                          <?php
                                          if ($Loggedin) {
                                          ?>
                                            <div class="col-md-3">
                                            <i data-toggle="modal" data-target="#<?php echo $commentid ?>Modal" class="fas fa-dumpster"></i>
                                            </div>
                                          <?php
                                          }
                                          ?>

                                          <div class="modal fade" id="<?php echo $commentid ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $commentid ?>ModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h3 class="modal-title" id="<?php echo $commentid ?>ModalLabel">Rapporteer comment: <?php echo $commentinhoud?></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">

                                                <div class="form-row align-items-center">
                                                  <div class="col-auto my-1">
                                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                                    <p>Let op! Hiermee kan je een comment reporten voor verschillende rededenen. Niet de bedoeling? Klik dan op "sluiten"</p>
                                                    <h3>Comment: <?php echo $commentinhoud?></h3>
                                                    <label class="custom-control-label" for="customControlAutosizing">Kies een overtreding</label>
                                                    
                                                    <form action="/report.php" method="post">
                                                    <select name="overtreding" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
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
                                                    <label class="custom-control-label" for="customControlAutosizing">Toevoeging</label>
                                                    <input type="text" name="Toevoeging" required>
                                                    <?php echo recaptchaform ();?>
                                                    <input type="hidden" name="commentid" value="<?php echo $commentid ?>" required>
                                                    <input type="hidden" name="memeid" value=<?php echo $memeid ?> required>
                                                    <input type="hidden" name="loggedinID" value="<?php echo $LoggedinID ?>" required>
                                                    <input type="hidden" name="comment" value="true" required>
                                                    <input type="hidden" name="meme" value="false" required>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                                <button type="submit" class="btn btn-danger">Rapporteer</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>


                                        </div>
                                        </div>

                                        <?php
                                            echo"</div>";
                                            echo"</div>";
                                            echo "<hr>";
                                            }
                                        } else {
                                            echo "<p class='memecomment' style='font-size: 1.4rem;'>Niemand heeft een comment geplaatst. Wees de eerste!</p>";
                                          }
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End meme card -->
                            <?php
                            if ($Loggedin) {
                              // Only comment if you are logged in.
                            ?>
                            
                            <div class="row memecards">
                                <div class="col-md-12">
                                    <form action="func.sendcomment.php" method="post">
                                        Laat een bericht achter!:<br>
                                        <input style="background-color: #2b3640; color: white; width: 100%;" type="text"
                                            name="comment" rows="3" maxlength="500" required><br><br>
                                        <input type="hidden" name="memeid" value="<?php echo "$cleanid"?>" required>
                                        <input type="hidden" name="userid" value="<?php echo "$LoggedinID"?>" required>
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                          <?php
                          }
                          ?>
                        </div>
                        <div class="col-md-3">
                            <div class="sticky-top" style="top: 82px;">
                                <h1>User-info</h1>
                                <a href='/account/?account=<?php echo $memeusername?>'>
                                  <img class="rounded img-thumbnail user-thumbnail" alt="Userpic" src="<?php echo $memeuserpic?>" />
                                </a>
                                <p style="word-wrap:break-word">
                                  <?php
                                  // Echo userinfo of the meme
                                    echo "Gebruiker: " .$memeusername . '<br>';
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
            // No get request
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Directe toegang is niet toegestaan.";
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