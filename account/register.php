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

    <!-- Start coding here! :D -->

    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">User registratie</h1>
      </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <?php
            if ($Loggedin) {
                  echo "<div class='alert alert-success' role='alert'>";
                  echo "Het lijkt erop dat je al ingelogd bent! Niet jou account? Of wil je opnieuw inloggen? <a style='color: red;' href='?logout=1'>Log-uit</a>";
                  echo "</div>";
                } else {

             require('func.register.php'); ?> 
            <?php require('form.register.php'); ?>           
            </div>


            <!-- Fancy user password validation - station! -->

            <script>
            var myInput = document.getElementById("password_1");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            document.getElementById("message").style.display = "none";

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
              document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
              document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function() {
              // Validate lowercase letters
              var lowerCaseLetters = /[a-z]/g;
              if(myInput.value.match(lowerCaseLetters)) {  
                letter.classList.remove("invalid");
                letter.classList.add("valid");
              } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
              }
              
              // Validate capital letters
              var upperCaseLetters = /[A-Z]/g;
              if(myInput.value.match(upperCaseLetters)) {  
                capital.classList.remove("invalid");
                capital.classList.add("valid");
              } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
              }

              // Validate numbers
              var numbers = /[0-9]/g;
              if(myInput.value.match(numbers)) {  
                number.classList.remove("invalid");
                number.classList.add("valid");
              } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
              }
              
              // Validate length
              if(myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
              } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
              }
            }
            </script>
            <?php
            }
            ?>
        </div>
    </div>
  </body>

  <footer>
    <?php require('../func.footer.php'); ?>
  </footer>
</html>