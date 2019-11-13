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
        <h1 class="display-3">Support</h1>
        <p>Vul het formulier hiernaast in en wij nemen zo spoedig mogelijk contact met u op.</p>

      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php require "func.support.php"; ?>
              <?php require "form.support.php"; ?>
            </div>

        </div>
    </div>
    </div>
    </div>

  <?php
    require "func.footer.php";
  ?>

      </body>
</html>
