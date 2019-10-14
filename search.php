


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HBO-ICTMemes</title>
    <?php
      include "func.header.php";
    ?>
  </head>

    <body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Search</h1>
        <p>You entered <b><?php echo $_POST["search"]; ?></b><br></p>

      </div>
    </div>

  <?php
    include "$websiteroot/func.footer.php";
  ?>

      </body>
</html>

