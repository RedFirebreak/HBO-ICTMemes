
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
            Support
            <p class="lead">Alle suport aanvragen</p>
            </h1>          

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Aantal aanvragen</h4>
              <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM support WHERE school='$LoggedinSchool' OR school='geen'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM support";
                  }
                  

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Aantal opgelost</h4>
              <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM support WHERE opgelost=1 AND school='$LoggedinSchool' OR opgelost=1 AND school='geen'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM support WHERE opgelost=1";
                  }
                  

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Aantal openstaand</h4>
              <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM support WHERE opgelost=0 AND school='$LoggedinSchool' OR opgelost=0 AND school='geen'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM support WHERE opgelost=0";
                  }
                  

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['amount'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
              <h4>Aantal in de afgelopen maand</h4>
              <?php
                // Set the query
                  $thismonth = date("Y-m-d");
                  $lastmonth = date("Y-m-d", strtotime("-1 months"));

                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT count(*) amount FROM `support` WHERE datum BETWEEN '$lastmonth' AND '$thismonth' AND school='$LoggedinSchool' OR datum BETWEEN '$lastmonth' AND '$thismonth' AND school='geen'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT count(*) amount FROM `support` WHERE datum BETWEEN '$lastmonth' AND '$thismonth'";
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
                <th>Support-ID</th>
                <th>Email</th>
                <th>Naam</th>
                <th>School</th>
                <th>Onderwerp</th>
                <th>Inhoud</th>
                <th>Datum</th>
                <th>Opgelost</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Set the query
        if ($LoggedinUserrole == 'admin') {
          $query = "SELECT * FROM support WHERE school='$LoggedinSchool' OR school='geen'";
        }
        if ($LoggedinUserrole == 'uber-admin') {
          $query = "SELECT * FROM support";
        }

        // Peform the query and save it in $row
        $result = mysqli_query($dbConnection, $query);

          if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["support-ID"]. "</td>";
                echo "<td>" . $row["email"]. "</td>";
                echo "<td>" . $row["naam"]. "</td>";
                echo "<td>" . $row["school"]. "</td>";
                echo "<td>" . $row["onderwerp"]. "</td>";
                echo "<td>" . $row["inhoud"]. "</td>";
                echo "<td>" . $row["datum"]. "</td>";
                
                // Verwerk de uitput van verified in "ja of nee"
                if ($row["opgelost"] == 1) {
                  echo "<td>Ja</td>";
                } else{
                  echo "<td>Nee</td>";
                }
                
                echo "</tr>";
               }
            } else {
               echo "0 results";
            }
        ?>    
        </tbody>
        <tfoot>
            <tr>
                <th>Support-ID</th>
                <th>Email</th>
                <th>Naam</th>
                <th>School</th>
                <th>Onderwerp</th>
                <th>Inhoud</th>
                <th>Datum</th>
                <th>Opgelost</th>
            </tr>
        </tfoot>
    </table>
          </div>

          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<script>
$(document).ready(function () {
$('#usertable').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->