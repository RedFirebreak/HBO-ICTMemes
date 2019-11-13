<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
        // Check if the user is allowed on the admin page
        if (!$Loggedin) {
          //Er is niemand ingelogd!
          require ("notallowed.php");
          exit;
        }
        // Then check if the user is allowed
        if (!$LoggedinUserrole == 'admin' OR !$LoggedinUserrole == 'uber-admin' OR $LoggedinUserrole == "user") {
          //Er is geen admin ingelogd, maar een user
          require ("notallowed.php");
          exit;
        }
		
		if (isset($_POST['reg_user'])) {
			// receive all input values from the form
			  $username = mysqli_real_escape_string($dbConnection, $_POST['username']);
			  $email = mysqli_real_escape_string($dbConnection, $_POST['email']);
			  $password_1 = mysqli_real_escape_string($dbConnection, $_POST['password_1']);
			  $password_2 = mysqli_real_escape_string($dbConnection, $_POST['password_2']);
			  if ($LoggedinUserrole == 'uber-admin') {
				$school = mysqli_real_escape_string($dbConnection, $_POST['school']);
				$rol = mysqli_real_escape_string($dbConnection, $_POST['rol']);
			  }
			  if ($LoggedinUserrole == 'admin') {
				$school = $LoggedinSchool;
				$rol = 'user';
			  }
			  $verificatie = mysqli_real_escape_string($dbConnection, $_POST['verified']);
			
			// form validation: ensure that the form is correctly filled ...
			// by adding (array_push()) corresponding error unto $errors array
			  if (empty($username)) {
				  //array_push($errors, "Username is verplicht");
				  echo "<div class='alert alert-danger' role='alert'>";
				  echo "Username is verplicht.";
				  echo "</div>";
				  return;
				}
			  if (empty($email)) {
				  //array_push($errors, "Email is required");
				  echo "<div class='alert alert-danger' role='alert'>";
				  echo "Email is verplicht.";
				  echo "</div>";
				  return;
				}
			  if (empty($password_1)) {
				  //array_push($errors, "Password is required");
				  echo "<div class='alert alert-danger' role='alert'>";
				  echo "Password is verplicht.";
				  echo "</div>";
				  return;
				}
			  if ($password_1 != $password_2) {
				//array_push($errors, "The two passwords do not match");
				echo "<div class='alert alert-danger' role='alert'>";
				echo "De twee passwords komen niet overeen.";
				echo "</div>";
				return;
			  }
			  // Validate password strength
				$uppercase = preg_match('@[A-Z]@', $password_1);
				$lowercase = preg_match('@[a-z]@', $password_1);
				$number    = preg_match('@[0-9]@', $password_1);

				//Maak de eventuele error message klaar
				$passreqerror = "";
				$passreqerror .= "<div class='alert alert-danger' role='alert'>";
				$passreqerror .= 'Password moet minimaal 8 characters zijn, 1 hoofdletter, 1 kleine letter en 1 nummer bevatten.';
				$passreqerror .= "</div>";

				if ($uppercase = 0) {echo $passreqerror; return;} // Check voor lowercase
				if ($lowercase = 0) {echo $passreqerror; return;} // Check voor uppercase
				if ($number = 0) {echo $passreqerror; return;} // Check voor nummer
				if (strlen($password_1) < 8) {echo $passreqerror; return;} // Check voor lengte

			  // Kijk nu of er al iets overeenkomt in de database
				// Maak het lowercase om te kijken of 
				$lowercaseusername = strtolower($username);
				$lowercaseemail = strtolower($email);

			  // first check the database to make sure 
			  // a user does not already exist with the same username and/or email
			  // $sqlchecktaken = "SELECT `username`, `usermail` FROM user WHERE username='$username' OR usermail='$lowercaseemail' LIMIT 1";
			  // $result = mysqli_query($dbConnection, $sqlchecktaken);
			  // $user = mysqli_fetch_assoc($result);

			  $sql = "SELECT `username`, `usermail` FROM user WHERE username='$username' OR usermail='$lowercaseemail' LIMIT 1";
			  $result = mysqli_query($dbConnection, $sql);
			  $row = mysqli_fetch_assoc($result);

			  // Convert the output to lowercase to compare the outputs 
			  $querylowercaseusername = strtolower($row['username']);
			  $querylowercaseemail = strtolower($row['usermail']);

			  // Check if username is taken
			  if ($querylowercaseusername === $lowercaseusername) {
			    echo "<div class='alert alert-danger' role='alert'>";
			    echo "Deze username bestaat al. Probeer het nog eens met een andere username.";
			    echo "</div>";
				
			  }
				// Check if mail is taken
					if ($querylowercaseemail === $lowercaseemail) {
					  echo "<div class='alert alert-danger' role='alert'>";
					  echo "Deze email is al geregistreerd. Probeer het nog eens met een ander email of log in met de huidige.";
					  echo "</div>";
					  // Log the failed existing mail
					  Customlog("Register", "log", "A user just tried registering with an existing email ($username - $email - With $school)");
					return;
					}

				   // If there is no matching user, register it!

				// Check if the query resulted 0 rows, just to be sure. If it does, we are sure that there is no user with the same username and/or

				if (mysqli_num_rows($result) < 1) {
					//register user if there are no errors in the form
					$password = md5($password_1);//encrypt the password before saving in the database. Usefull :)

					$query = "INSERT INTO user (username, usermail, wachtwoord, userrole, schoolnaam, profile_picture, is_verified) 
							VALUES('$username', '$lowercaseemail', '$password', '$rol', '$school','/storage/profilepictures/default.png', $verificatie)";
					mysqli_query($dbConnection, $query);

					Customlog("Register", "log", "New User created! ($username - With $email)");
				}
		}
?>

<h1 class="page-header">
    Users
    <p class="lead">Alle users in de database</p>
</h1>

<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal users</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM user WHERE schoolnaam='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT COUNT(*) aantal from user";
                  }

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Unverified</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM `user` WHERE is_verified=0 AND schoolnaam='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM `user` WHERE is_verified=0";
                  }
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Verified</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM `user` WHERE is_verified=1 AND schoolnaam='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM `user` WHERE is_verified=1";
                  }
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Banned</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM `user` WHERE gebanned=1 AND schoolnaam='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM `user` WHERE gebanned=1";
                  }
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-mute'><h2>$aantal</h2></span>";
              ?>
    </div>
</div>

<hr>

<!-- <h2 class="sub-header">Here's a table</h2> -->
<div class="table-responsive">
    <table id="usertable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>User-ID</th>
                <th>Usermail</th>
                <th>Username</th>
                <th>Schoolnaam</th>
                <th>Laatste Login</th>
                <th>Userrol</th>
                <th>Verified</th>
                <th>Banned</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Set the query
        if ($LoggedinUserrole == 'admin') {
          $query = "SELECT * FROM user WHERE schoolnaam='$LoggedinSchool'";
        }
        if ($LoggedinUserrole == 'uber-admin') {
          $query = "SELECT * FROM user";
        }

        // Peform the query and save it in $row
        $result = mysqli_query($dbConnection, $query);

          if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                $userid = $row["user-ID"];
                $usermail = $row["usermail"];
                $username =  $row["username"];
                $schoolnaam = $row["schoolnaam"];
                $verified = $row["is_verified"];
                $banned = $row["gebanned"];

                $modalid = $row["user-ID"];
                $modaltitle = $row["username"];
                echo "<tr>";
                echo "<td>" . $row["user-ID"]. "</td>";
                echo "<td>" . $row["usermail"]. "</td>";
                echo "<td>" . $row["username"]. "</td>";
                echo "<td>" . $row["schoolnaam"]. "</td>";
                echo "<td>" . $row["laatste_login"]. "</td>";
                echo "<td>" . $row["userrole"]. "</td>";
                
                // Verwerk de uitput van verified in "ja of nee"
                if ($row["is_verified"] == 1) {
                  echo "<td>Ja</td>";
                } else{
                  echo "<td>Nee</td>";
                }
                // Verwerk de uitput van gebanned in "ja of nee"
                if ($row["gebanned"] == 1) {
                  echo "<td>Ja</td>";
                } else{
                  echo "<td>Nee</td>";
                }
                ?>

            <td><i data-toggle="modal" data-target="#<?php echo $modalid ?>Modal" class="fas fa-pencil-alt"></i></td>
            <td><i data-toggle="modal" data-target="#<?php echo $modalid ?>Modal2" class="fa fa-trash"></i></td>
            </tr>

            <!-- Geef elke row zijn eigen delete en edit modal mee -->
            <div class="modal fade" id="<?php echo $modalid ?>Modal" tabindex="-1" role="dialog"
                aria-labelledby="<?php echo $modalid ?>ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="<?php echo $modalid ?>ModalLabel">
                                Edit <?php echo $modaltitle?></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <p>Let op! Hiermee kan je de gegevens wijzigen.</p>
                                    <form action="/admin/?page=editrow" method="post">

                                        Usermail:<br>
                                        <input type="text" name="newusermail" value="<?php echo $usermail ?>"
                                            required><br>
                                        Username:<br>
                                        <input type="text" name="newusername" value="<?php echo $username ?>"
                                            required><br>
                                        Schoolnaam:<br>
                                        <input type="text" name="newschool" value="<?php echo $schoolnaam ?>"
                                            required><br>
                                        Verified:<br>
                                        <select name="newverified" required>
                                            <option value="ja">Ja</option>
                                            <option value="nee">Nee</option>
                                        </select><br>
                                        Banned:<br>
                                        <select name="newbanned" required>
                                            <option value="nee">Nee</option>
                                            <option value="ja">ja</option>
                                        </select><br>

                                        <input type="checkbox" required>Ja ik wil de gegeven wijzigen.<br>

                                        <input type="hidden" name="soort" value="users" required>
                                        <input type="hidden" name="userid" value="<?php echo $userid ?>" required>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="<?php echo $modalid ?>Modal2" tabindex="-1" role="dialog"
                aria-labelledby="<?php echo $modalid ?>ModalLabel2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="<?php echo $modalid ?>ModalLabel2">
                                Delete <?php echo $modaltitle?></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <p>Let op! Hiermee kan je de gegevens verwijderen!</p>
                                    <form action="/admin/?page=deleterow" method="post">

                                        <input type="checkbox" required>Ja ik wil de gegeven verwijderen.<br>

                                        <input type="hidden" name="soort" value="users" required>
                                        <input type="hidden" name="userid" value="<?php echo $userid ?>" required>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                echo "</tr>";
               }
            } else {
               echo "0 results";
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>User-ID</th>
                <th>Usermail</th>
                <th>Username</th>
                <th>Schoolnaam</th>
                <th>Laatste Login</th>
                <th>Userrol</th>
                <th>Verified</th>
                <th>Banned</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
</div>


<h2 class="sub-header">User toevoegen</h2>
<form action="?page=users" method="post">
	<p>Username<br>
        <input type="text" name="username" required></p>

    <p>Email<br>
        <input type="email" name="email" required></p>

<?php 	if ($LoggedinUserrole == 'uber-admin') { ?>
    <p>School<br>
        <select name="school">
            <?php
            // Query voor alle schoolnamen, en vervolgens ze in een dropdown zetten
			$sql = "SELECT schoolnaam s FROM school ORDER by 1;";
            $result = $dbConnection->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["s"]. "'>" . $row["s"] . "</option>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </select>
        <p>
		
	<p>Userrol<br>
		<select name="rol">
			<?php
			//querry voor alle rollen, en vervolgens ze in een dropdown zetten
			$sql = "SELECT userrole r FROM rollen ORDER by 1;";
			$result = $dbConnection->query($sql);
			if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["r"]. "'>" . $row["r"] . "</option>";
                }
            } else {
                echo "0 results";
            }
		}
            ?>
        </select>
        <p>
		
            <p>Password<br>
                <input type="password" id="password_1" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    required></p>
            <div class="col-md-6" id="message">
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>


            <p>Confirm password<br>
                <input type="password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p>
				
		<p>Verificatie<br>
		<select name="verified">
			<option value="1">Wel geverifieerd</option>
			<option value="0">Niet geverifieerd</option>
		</select></p>
				
		<button type="submit" class="btn btn-primary" name="reg_user">Register</button>
</form>


</div>
<!--/row-->
</div>
</div>
<!--/.container-->

<script>
$(document).ready(function() {
    $('#usertable').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
</script>
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

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->