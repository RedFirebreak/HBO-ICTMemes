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

      </div>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Problemen? Vragen?</h2>
            <p>Vul het formulier hiernaast in en wij nemen zo spoedig mogelijk contact met u op.</p>
          </div>
            <div class="col-md-6">
              <?php
                if(isset($_POST['naam'])) {
                  //naam is set, so the form is filled. Lets go!
                  //setting variables
                  $supportnaam = $_POST['naam'];
                  $supportemail = $_POST['mail'];
                  $supportonderwerp = $_POST['onderwerp'];
                  $supportbeschrijving = $_POST['beschrijving'];

                  //Clean the user input
                  $safesupportnaam = mysqli_real_escape_string($dbConnection, $supportnaam);
                  $safesupportemail = mysqli_real_escape_string($dbConnection, $supportemail);
                  $safesupportonderwerp = mysqli_real_escape_string($dbConnection, $supportonderwerp);
                  $safesupportbeschrijving = mysqli_real_escape_string($dbConnection, $supportbeschrijving);

                  //prepare the query
                  $sql = "INSERT INTO `support`(`email`, `naam`, `onderwerp`, `inhoud`) VALUES ('$safesupportemail','$safesupportnaam','$safesupportonderwerp', '$safesupportbeschrijving')";
                  //peform query!
                  $querycheck = $dbConnection->query($sql);
                
                  //Check if the query was successfull
                  if($querycheck == false)
                    { 
                      // There was an error. log it!
                      Customlog("Support", "error", "A Support form couldn't be send: The query failed");

                      // Inform the user
                      echo "<div class='alert alert-danger' role='alert'>";
                      echo "Er was een probleem met het verzenden van de form. Probeer het later opnieuw. De administrators zijn op de hoogte gebracht van dit probleem.";
                      echo "</div>";
                    } else {
                      echo "<div class='alert alert-success' role='alert'>";
                      echo "Success! Bedankt voor uw support-aanvraag. We nemen zo snel mogelijk contact met u op. <br>";
                      echo "</div>";
                    }
                  }
                ?>

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
