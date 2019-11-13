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
    Errors
    <p class="lead">Alle users in de database</p>
</h1>

<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal errors</h4>
        <?php
                // Set the query
                  $aantalquery = "SELECT COUNT(*) aantal from error";

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal soort: ERROR</h4>
        <?php
                // Set the query
                  $aantalquery = "SELECT count(*) amount FROM `error` WHERE soort='ERROR'";
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal soort: CRITICAL</h4>
        <?php
                // Set the query
                  $aantalquery = "SELECT count(*) amount FROM `error` WHERE soort='CRITICAL'";
                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
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
                <th>Error-ID</th>
                <th>Locatie</th>
                <th>Datum</th>
                <th>Soort</th>
                <th>Bericht</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // Set the query
          $query = "SELECT * FROM error";

        // Peform the query and save it in $row
        $result = mysqli_query($dbConnection, $query);

          if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["error-ID"]. "</td>";
                echo "<td>" . $row["locatie"]. "</td>";
                echo "<td>" . $row["datum"]. "</td>";
                echo "<td>" . $row["soort"]. "</td>";
                echo "<td>" . $row["bericht"]. "</td>";
                echo "</tr>";
               }
            } else {
               echo "0 results";
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Error-ID</th>
                <th>Locatie</th>
                <th>Datum</th>
                <th>Soort</th>
                <th>Bericht</th>
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