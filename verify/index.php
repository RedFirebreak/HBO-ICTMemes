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
        <title>HBO-Memes - PAGENAME</title>
        <?php require('../func.header.php'); ?>
    </head>

    <body>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-12">
                    <?php 
            // Als "href="?emailverificatie='1' gezet is, wordt dit uitgevoerd.
            // Emailverificatie
            if (isset($_GET['emailverificatie'])) {
              require('func.emailverificatie.php');
            }
          ?>

                    <!-- OF de ander -->

                    <?php 
            // Als "href="?resetpassword='1' gezet is, wordt dit uitgevoerd.
            // ResetPassword
            if (isset($_GET['wachtwoordreset'])) {
              require('form.resetpassword.php');
            }
          ?>
          <script>
            var myInput = document.getElementById("newpassword");
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
                </div>
            </div>
        </div>
    </body>

    <footer>
        <?php require('../func.footer.php'); ?>
    </footer>

    </html>