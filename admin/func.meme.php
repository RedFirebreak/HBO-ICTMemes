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
    Memes
</h1>

<?php 
	
?>
<div class="row placeholders">
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
					echo $whatevz['count(`meme-ID`)'];
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
    <!--
            <div class="col-xs-6 col-sm-3 placeholder text-center">
              <!-- <img src="#" class="center-block img-responsive img-circle" alt="Generic placeholder thumbnail">  THIS IS SO YOU CAN IMPORT AN IMAGE -->
    <!--<h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>-->
</div>

<hr>

<h2 class="sub-header">De meme-tabel</h2>
<div class="table-responsive">
    <table id="usertable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>meme-ID</th>
                <th>meme-titel</th>
                <th>user-ID</th>
                <th>datum</th>
                <th>locatie</th>
                <th>school</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
					if ($LoggedinUserrole == 'uber-admin'){
						$query = "select * from meme order by 1";
					}
					if ($LoggedinUserrole == 'admin'){
						$query = "select * from meme where `school` in ('$LoggedinSchool') order by 1 ";
					}
					$result = $dbConnection->query($query);
					while ($record = mysqli_fetch_assoc($result))
					{
                        $titel =$record['meme-titel'];
                        $locatie = $record['locatie'];
                        $school = $record['school'];
                        $memeid = $record['meme-ID'];

                        $modalid = $record['meme-ID'];
                        $modaltitle = $record['meme-titel'];
						echo "<tr>
						<td>".$record['meme-ID']."</td>
						<td>".$record['meme-titel']."</td>
						<td>".$record['user-ID']."</td>
						<td>".$record['datum']."</td>
						<td>".$record['locatie']."</td>
                        <td>".$record['school']."</td>"
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

                                        Usertitel:<br>
                                        <input type="text" name="newtitel" value="<?php echo $titel ?>" required><br>
                                        Locatie:<br>
                                        <input type="text" name="newlocatie" value="<?php echo $locatie?>" required><br>
                                        School:<br>
                                        <input type="text" name="newschool" value="<?php echo $school ?>" required><br>

                                        <input type="checkbox" required>Ja ik wil de gegeven wijzigen.<br>

                                        <input type="hidden" name="soort" value="memes" required>
                                        <input type="hidden" name="memeid" value="<?php echo $memeid ?>" required>
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

                                        <input type="hidden" name="soort" value="memes" required>
                                        <input type="hidden" name="locatie" value="<?php echo $locatie ?>" required>
                                        <input type="hidden" name="memeid" value="<?php echo $memeid ?>" required>

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
					?>
        </tbody>
        <tfoot>
            <tr>
                <th>meme-ID</th>
                <th>meme-titel</th>
                <th>user-ID</th>
                <th>datum</th>
                <th>locatie</th>
                <th>school</th>
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