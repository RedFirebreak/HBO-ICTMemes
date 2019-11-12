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
	
	//query voor het toevoegen van een rij
	if ($LoggedinUserrole == 'uber-admin') {
		if (isset($_POST['submit'])) {
			$nieuwschool = mysqli_real_escape_string($dbConnection, $_POST['name']);
			$sql = "insert into school (`schoolnaam`) values ('$nieuwschool')";
			$result = $dbConnection->query($sql);
		}
	}
?>

<h1 class="page-header">
    School admins
</h1>

<div class="row placeholders">
    <?php if ($LoggedinUserrole == 'uber-admin') { ?>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal scholen</h4>
        <span class="text-muted">
            <?php 
					$query = "select count(schoolnaam) from school";
					$result = $dbConnection->query($query);
					$whatevz = mysqli_fetch_assoc($result);
					echo $whatevz['count(schoolnaam)'];
				  ?>
        </span>
    </div>
    <?php } ?>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal admins</h4>
        <span class="text-muted">
            <?php 
					if ($LoggedinUserrole == 'admin') {
						$query = "select count(username) from user where userrole in ('admin', 'uber-admin') and schoolnaam in ('$LoggedinSchool');";
					}
					if ($LoggedinUserrole == 'uber-admin') {
						$query = "select count(username) from user where userrole in ('admin', 'uber-admin');";
					}
					$result = $dbConnection->query($query);
					$whatevz = mysqli_fetch_assoc($result);
					echo $whatevz['count(username)'];
				  ?>
        </span>
    </div>
    <!--<div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
    <!--<h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
    <!--<h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>-->
</div>

<hr>

<h2 class="sub-header">De admin-tabel</h2>
<div class="table-responsive">
    <table id="usertable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Schoolnaam</th>
                <th>Gebruikersnaam</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($LoggedinUserrole == 'admin') {
            $query = "select schoolnaam from school where schoolnaam='$LoggedinSchool' order by 1";
            }
            if ($LoggedinUserrole == 'uber-admin') {
            $query = "select schoolnaam from school order by 1";
            }

				  $result = $dbConnection->query($query);
				  while ($record = mysqli_fetch_assoc($result))
				  {
            echo "<tr><th>".$record['schoolnaam']."</th>";
            $sql = "select * from user where userrole in ('admin', 'uber-admin') and schoolnaam in ('".$record['schoolnaam']."');";
            $dinges = $dbConnection->query($sql);
            if ($dinges->num_rows > 0) {
              // output data of each row
              while ($dinkus = mysqli_fetch_assoc($dinges))
              {
                echo "<td>".$dinkus['username']."</td>";
                
              }
          } else {
            echo "<td>  </td>";
          }
					echo "</tr>";
				  }
                  ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Schoolnaam</th>
                <th>Gebruikersnaam</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php
if ($LoggedinUserrole == 'uber-admin') { ?>
<h2 class="sub-header">Rij toevoegen</h2>
<form action="?page=schooladmins" method="post">
	<input type="text" name="name" id="name">
	<input type="submit" name="submit" value="Toevoegen">
</form>
<?php } ?>
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