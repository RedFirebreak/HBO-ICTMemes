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
        echo "<br>";
        // Boolean / true or false (if loggedin, do this)"
        $Loggedin;

        //Userinfo
        echo "UserID: " .$LoggedinID . "<br>";
        echo "Usermail: " .$LoggedinUsermail . "<br>";
        echo "Username: " .$LoggedinUsername . "<br>";
        echo "Userrole: " .$LoggedinUserrole . "<br>";
        echo "Is verified: " .$LoggedinVerified . "<br>";
        echo "Is banned: " .$LoggedinGebanned . "<br>";

        if ($Loggedin) {
          echo "Er is iemand ingelogd!";
      } else {
          echo "Er is niemand ingelogd";
      }

        ?></p>

      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-9">
              <!-- Meme- cards -->
              <div class="row memecards">
                <!-- Load the meme - part -->
                <div class="col-md-8 divmemeimage">
                  <h3><b>So this is just a generic picture I thought of sharing. So this is just a generic picture I thought of sharing. So this is just a generic picture I thought of sharing.</b></h3>
                  <hr>
                  <img src="https://cdn.discordapp.com/attachments/625662396127772672/639604401715019786/aC4HFF4_d.jpg" class="memeimage rounded mx-auto d-block" alt="...">
                </div>
                <!-- Load the extra info part -->
                <div class="col-md-4 divmemeinfo">
                 <div class="row">
                    <div class="col-md-4">
                      <img class="rounded img-thumbnail user-thumbnail" alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg"/>
                    </div>
                    <div class="col-md-8">
                      <p style="word-wrap:break-word">RedFirebreakRedFirebreakRedFirebreakRedFirebreakkk <br>Joined: 07-11-2019 <br>Admin</p>
                    </div>
                      <div class="col-md-12">
                        <hr>
                          <p style="margin: 1px 0;"><b>Top Comment:</b></p>
                          <p class="oneline" style="font-size: 1rem; margin: 1px 0;">u/RedFirebreakRedFirebreakRedFirebreakRedFirebreakkk</p>
                          <p class="top-comment" style="font-size: 1.4rem;">Look at this autograph, everytime I see it makes me laugh.</p>
                        <hr>
                      </div>
                  </div>
                  <!-- Voting part -->
                  <div class="row text-center d-flex align-items-end">
                    <div class="col-md-6">
                      <span><i class="fas fa-chevron-up fa-2x"></i></span>
                    </div>
                    <div class="col-md-6">
                      <span><i class="center fas fa-chevron-down fa-2x"></i></span>
                    </div>
                   </div>
                </div>
              </div>
              <!-- End meme card -->

              <!-- Meme- cards -->
              <div class="row memecards">
                <!-- Load the meme - part -->
                <div class="col-md-8 divmemeimage">
                  <h3><b>So this is just a generic picture I thought of sharing. So this is just a generic picture I thought of sharing. So this is just a generic picture I thought of sharing.</b></h3>
                  <hr>
                  <img src="https://cdn.discordapp.com/attachments/625662396127772672/641698928588488715/15730633406175835870646951465086.jpg" class="memeimage rounded mx-auto d-block" alt="...">
                </div>
                <!-- Load the extra info part -->
                <div class="col-md-4 divmemeinfo">
                 <div class="row">
                    <div class="col-md-4">
                      <img class="rounded img-thumbnail user-thumbnail" alt="Bootstrap Image Preview" src="https://www.layoutit.com/img/sports-q-c-140-140-3.jpg"/>
                    </div>
                    <div class="col-md-8">
                      <p style="word-wrap:break-word">RedFirebreak<br>Joined: 07-12-2019 <br>Admin</p>
                    </div>
                      <div class="col-md-12">
                        <hr>
                          <p style="margin: 1px 0;"><b>Top Comment:</b></p>
                          <p class="oneline" style="font-size: 1rem; margin: 1px 0;">u/RedFirebreak</p>
                          <p class="top-comment" style="font-size: 1.4rem;">Lol, this meme is so fuckin funny.</p>
                        <hr>
                      </div>
                  </div>
                  <!-- Voting part -->
                  <div class="row text-center d-flex align-items-end">
                    <div class="col-md-6">
                      <span><i class="fas fa-chevron-up fa-2x"></i></span>
                    </div>
                    <div class="col-md-6">
                      <span><i class="center fas fa-chevron-down fa-2x"></i></span>
                    </div>
                   </div>
                </div>
              </div>
              <!-- End meme card -->

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
