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

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->