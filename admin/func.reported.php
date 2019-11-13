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
    Gerapporteerde memes/comments
    <p class="lead">Alle users in de database</p>
</h1>

<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal comment-reports</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM `comment-report`
					inner join comments on `comment-report`.`comment-ID`=comments.`comment-ID`
					inner join meme on comments.`meme-ID`=meme.`meme-ID`
					where `school`='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT COUNT(*) aantal from `comment-report`";
                  }

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal meme-reports</h4>
        <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM `meme-report`
									inner join meme on `meme-report`.`meme-ID`=meme.`meme-ID`
									where `school`='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM `meme-report`";
                  }
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
</div>

<hr>

<h2 class="sub-header">Comment-reports</h2>
<div class="table-responsive">
    <table id="usertable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Report-ID</th>
                <th>Comment-ID</th>
                <th>Reporter-ID</th>
                <th>Reported-ID</th>
                <th>Datum</th>
                <th>Overtreding</th>
                <th>Beschrijving</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Set the query
        if ($LoggedinUserrole == 'admin') {
          $query = "SELECT `report-ID`, `comment-report`.`comment-ID`, `snitch-ID`, `boef-ID`, `comment-report`.`datum`, `overtreding`, `beschrijving` 
					FROM `comment-report`
					inner join comments on `comment-report`.`comment-ID`=comments.`comment-ID`
					inner join meme on comments.`meme-ID`=meme.`meme-ID`
					where `school`='$LoggedinSchool'";
        }
        if ($LoggedinUserrole == 'uber-admin') {
          $query = "SELECT * FROM `comment-report`";
        }

        // Peform the query and save it in $row
        $result = mysqli_query($dbConnection, $query);

          if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["report-ID"]. "</td>";
                echo "<td>" . $row["comment-ID"]. "</td>";
                echo "<td>" . $row["snitch-ID"]. "</td>";
                echo "<td>" . $row["boef-ID"]. "</td>";
                echo "<td>" . $row["datum"]. "</td>";
                echo "<td>" . $row["overtreding"]. "</td>";
                echo "<td>" . $row["beschrijving"]. "</td>";
                
                $modalid = $row["report-ID"];
                $modaltitle = $row["beschrijving"];
                $memereportID = $row["report-ID"];

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

                                        <input type="hidden" name="soort" value="report1" required>
                                        <input type="hidden" name="reportid" value="<?php echo $memereportID ?>"
                                            required>

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
                <th>Report-ID</th>
                <th>Comment-ID</th>
                <th>Reporter-ID</th>
                <th>Reported-ID</th>
                <th>Datum</th>
                <th>Overtreding</th>
                <th>Beschrijving</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
</div>

<h2 class="sub-header">Meme-reports</h2>
<div class="table-responsive">
    <table id="usertable1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Report-ID</th>
                <th>Meme-ID</th>
                <th>Reporter-ID</th>
                <th>Reported-ID</th>
                <th>Datum</th>
                <th>Overtreding</th>
                <th>Beschrijving</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Set the query
        if ($LoggedinUserrole == 'admin') {
          $query = "SELECT `report-ID`, `meme-report`.`meme-ID`, `snitch-ID`, `boef-ID`, `meme-report`.`datum`, `overtreding`, `beschrijving` 
					FROM `meme-report`
					inner join meme on `meme-report`.`meme-ID`=meme.`meme-ID`
					where `school`='$LoggedinSchool'";
        }
        if ($LoggedinUserrole == 'uber-admin') {
          $query = "SELECT * FROM `meme-report`";
        }

        // Peform the query and save it in $row
        $result = mysqli_query($dbConnection, $query);

          if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["report-ID"]. "</td>";
                echo "<td>" . $row["meme-ID"]. "</td>";
                echo "<td>" . $row["snitch-ID"]. "</td>";
                echo "<td>" . $row["boef-ID"]. "</td>";
                echo "<td>" . $row["datum"]. "</td>";
                echo "<td>" . $row["overtreding"]. "</td>";
				        echo "<td>" . $row["beschrijving"]. "</td>";
                
                $modalid = $row["report-ID"];
                $modaltitle = $row["beschrijving"];
                $commentreportID = $row["report-ID"];

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

                                        <input type="hidden" name="soort" value="report2" required>
                                        <input type="hidden" name="reportid" value="<?php echo $commentreportID ?>"
                                            required>

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
                <th>Report-ID</th>
                <th>Meme-ID</th>
                <th>Reporter-ID</th>
                <th>Reported-ID</th>
                <th>Datum</th>
                <th>Overtreding</th>
                <th>Beschrijving</th>
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
<script>
$(document).ready(function() {
    $('#usertable1').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
</script>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->