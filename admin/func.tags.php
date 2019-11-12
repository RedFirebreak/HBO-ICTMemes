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

<h2 class="sub-header">De tag-tabel</h2>
<div class="table-responsive">
    <table id="usertable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Tag-ID</th>
                <th>Tagnaam</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
				$query = "select * from tags order by 1";
				$result = $dbConnection->query($query);
				while ($record = mysqli_fetch_assoc($result))
				{
                    $tagid = $record['tag-ID'];
                    $tagnaam = $record['tagnaam'];
                    $modalid = $tagid;
                    $modaltitle = $tagnaam;

					echo "<td>$tagid</td>";
                    echo "<td>$tagnaam</td>";
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

                                        Nieuwe tagnaam:<br>
                                        <input type="text" name="newtagname" value="<?php echo $tagnaam ?>"
                                            required><br>

                                        <input type="checkbox" required>Ja ik wil de gegeven wijzigen.<br>

                                        <input type="hidden" name="soort" value="tags" required>
                                        <input type="hidden" name="tagid" value="<?php echo $tagid ?>" required>

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

                                        <input type="hidden" name="soort" value="tags" required>
                                        <input type="hidden" name="tagid" value="<?php echo $tagid ?>" required>

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
				}
				?>
        </tbody>
        <tfoot>
            <tr>
                <th>Tag-ID</th>
                <th>Tagnaam</th>
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
<?php 
if (!empty($_POST['addtag'])){
	$newtag = mysqli_real_escape_string($dbConnection, $_POST["tag"]);
	
	if ($Loggedin) {
		if (isset($_POST["submit"])){
		$sql = "SELECT `tag-id` FROM tags";
		$result = mysqli_query($dbConnection, $sql);
		$row = mysqli_fetch_assoc($result);
		$tagID = $row['tag-id'];
		$tagID++; 	
		
		$addtag = "INSERT INTO tags (`tag-ID`, `tagnaam`) VALUES ($tagID,$newtag)";
		
		$insert = mysqli_query($dbConnection, $addtag);
		}
	}
}
?>
<form action="func.tags.php" id="update" method="post">
    Voeg een tag aan de website:<input type="text" value="tag" name="tag"><br>
    <input type="hidden" name="addtag" value="true">
    <button type="submit" value="submit" name="submit">submit</button>
</form>

<!--/.container-->
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $('#usertable').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
</script>