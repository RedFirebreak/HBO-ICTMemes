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
    Tags
    <p class="lead">(<a href="http://www.bootply.com/128936">with off-canvas sidebar</a>)</p>
</h1>

<div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
        <h4>Aantal tags</h4>
        <span class="text-muted">
            <?php 
				  $query = "select count(tagnaam) from tags";
				  $result = $dbConnection->query($query);
				  $whatevz = mysqli_fetch_assoc($result);
				  echo $whatevz['count(tagnaam)'];
				?>
        </span>
    </div>
</div>

<hr>

<h2 class="sub-header">Here's a table</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <?php
				$query = "select * from tags order by 1";
				$result = $dbConnection->query($query);
				while ($record = mysqli_fetch_assoc($result))
				{
					echo "<tr>
					<td>".$record['tag-ID']."</td>
					<td>".$record['tagnaam']."</td>
					</tr>";
				}
				?>
            </tbody>
    </table>
</div>


</div>
<!--/row-->
</div>
</div>
<!--/.container-->

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->