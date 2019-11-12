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
    Upvote/Downvotes
    <p class="lead">Alle users in de database</p>
</h1>

<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal upvotes</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM upvote 
					inner join meme on upvote.`meme-ID`=meme.`meme-ID`
					WHERE soort='upvote' and meme.`school`='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM upvote WHERE soort='upvote'";
                  }

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
				  if (empty($aantal)) {$aantal="0";}
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal downvotes</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM upvote 
					inner join meme on upvote.`meme-ID`=meme.`meme-ID`
					WHERE soort='downvote' and meme.`school`='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) aantal FROM upvote WHERE soort='downvote'";
                  }
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
				  if (empty($aantal)) {$aantal="0";}
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
</div>

<hr>

<!-- <h2 class="sub-header">Here's a table</h2> -->
<div class="table-responsive">
    <table id="usertable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Upvote-ID</th>
                <th>Meme-ID</th>
                <th>User-ID</th>
                <th>Soort</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Set the query
        if ($LoggedinUserrole == 'admin') {
          $query = "Select `upvote-ID`, upvote.`meme-ID`, upvote.`user-ID`, `soort`
					from upvote
					inner join meme on upvote.`meme-ID`=meme.`meme-ID`
					where meme.`school`='$LoggedinSchool'";
        }
        if ($LoggedinUserrole == 'uber-admin') {
          $query = "SELECT * FROM upvote";
        }

        // Peform the query and save it in $row
        $result = mysqli_query($dbConnection, $query);

          if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["upvote-ID"]. "</td>";
                echo "<td>" . $row["meme-ID"]. "</td>";
                echo "<td>" . $row["user-ID"]. "</td>";
                echo "<td>" . $row["soort"]. "</td>";

                $modalid = $row["upvote-ID"];
                $modaltitle = $row["upvote-ID"];
                $voteid = $row["upvote-ID"];

                ?>

            <td><i data-toggle="modal" data-target="#<?php echo $modalid ?>Modal2" class="fa fa-trash"></i></td>
            </tr>

            <!-- Geef elke row zijn eigen delete modal mee -->
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

                                        <input type="hidden" name="soort" value="votes" required>
                                        <input type="hidden" name="voteid" value="<?php echo $voteid ?>" required>

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
                <th>Upvote-ID</th>
                <th>Meme-ID</th>
                <th>User-ID</th>
                <th>Soort</th>
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