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
    School admins
</h1>

<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal users</h4>
        <span class="text-muted">
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
        </span>
    </div>
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
					$aantal = $whatevz['count(username)'];
					echo "<span class='text-muted'><h2>$aantal</h2></span>";
				  ?>
        </span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal comments</h4>
        <span class="text-muted">
            <?php
                // Set the query
                  if ($LoggedinUserrole == 'admin') {
                    $aantalquery = "SELECT COUNT(*) aantal FROM comments 
					inner join meme on comments.`meme-ID`=meme.`meme-ID`
					WHERE meme.`school`='$LoggedinSchool'";
                  }
                  if ($LoggedinUserrole == 'uber-admin') {
                    $aantalquery = "SELECT COUNT(*) aantal from comments";
                  }

                  $aantalresult = mysqli_query($dbConnection, $aantalquery);
                  $aantalrow = mysqli_fetch_assoc($aantalresult);
                  $aantal = $aantalrow['aantal'];
                  echo "<span class='text-muted'><h2>$aantal</h2></span>";
              ?>
        </span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal memes</h4>
        <span class="text-muted">
            <?php 
					if ($LoggedinUserrole == 'uber-admin'){
						$query = "select count(`meme-ID`) from meme";
					}
					else {
						$query = "select count(`meme-ID`) from meme where school = '$LoggedinSchool'";
					}
					$result = $dbConnection->query($query);
					$whatevz = mysqli_fetch_assoc($result);
					$aantal = $whatevz['count(`meme-ID`)'];
					echo "<span class='text-muted'><h2>$aantal</h2></span>";
				  ?>
        </span>
    </div>
    <?php
			if ($LoggedinUserrole == 'uber-admin'){
				$query = "select schoolnaam from school order by 1";
				$result = $dbConnection->query($query);
				while ($record = mysqli_fetch_assoc($result))
				{
				  echo "<div class='col-xs-6 col-sm-3 placeholder text-center'>
					<!-- <img src='#' class='center-block img-responsive img-circle' alt='Generic placeholder thumbnail'>  THIS IS SO YOU CAN IMPORT AN IMAGE -->
					<h4>Aantal ".$record['schoolnaam']."-memes</h4>
					<span class='text-muted'>";
					   
						$sql = "select count(`meme-ID`) from meme where school in ('{$record['schoolnaam']}');";
						$dinges = $dbConnection->query($sql);
						$whatevz = mysqli_fetch_assoc($dinges);
						echo $whatevz['count(`meme-ID`)'];
					  
					echo "</span>
					</div>";
				}
			}
			?>
</div>

<hr>

<!--<h2 class="sub-header">Here's a table</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>dolor</td>
                <td>sit</td>
            </tr>
            <tr>
                <td>1,002</td>
                <td>amet</td>
                <td>consectetur</td>
                <td>adipiscing</td>
                <td>elit</td>
            </tr>
            <tr>
                <td>1,003</td>
                <td>Integer</td>
                <td>nec</td>
                <td>odio</td>
                <td>Praesent</td>
            </tr>
        </tbody>
    </table>
</div>-->


</div>
<!--/row-->
</div>
</div>
<!--/.container-->