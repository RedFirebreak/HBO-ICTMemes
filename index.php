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
        <div class="col-md-9">

          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut risus est. Praesent tempus, elit at volutpat placerat, eros massa condimentum lectus, vel tempor velit tortor vel nulla. Nam in tincidunt elit. In eu dolor a lectus condimentum faucibus vel in felis. Nunc laoreet massa sollicitudin lacus mollis, vitae egestas ex dignissim. Vestibulum egestas sapien sodales erat feugiat, id vulputate nunc eleifend. Etiam pharetra nibh in erat lacinia, et gravida ante porttitor. Phasellus finibus ac enim id pharetra. Integer vehicula non ligula mollis pharetra. Nunc pretium non tortor nec dapibus.
          Ut pretium sem ut tortor consectetur, sed efficitur dui aliquam. Maecenas auctor euismod nulla, eu aliquam turpis vestibulum sed. Nam ac tortor urna. In sed nisi ut ex mollis gravida sed sit amet turpis. Vivamus mi libero, fringilla in elit non, commodo interdum nulla. Quisque leo mi, luctus ut diam ut, tincidunt efficitur nunc. Suspendisse et lectus consequat, aliquam ex quis, interdum diam. Aliquam in quam at nisi blandit lacinia vitae a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
          
        </div>

        <div class="col-md-3">
          <div class="sticky-top" style="top: 82px;">
              <h1>Sticky-Info</h1>
              <p>Tags, uploads, info and other stuff will be displayed here. Come back later when we have actually done stuff!</p>
          </div> 
        </div>

    </div>
      <!-- Example row of columns 
      <div class="row">
        <div class="col-md-6">
            <h2>Memes here!</h2>
            <p>"Insert epic meme image"</p>
            <br>
            <br>
            <br>



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
    </div> -->

  <?php
    require "func.footer.php";
  ?>

      </body>
</html>
