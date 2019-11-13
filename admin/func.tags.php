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
    <div class="col-xs-6 col-sm-3 placeholder text-center">
        <form action="/admin/?page=tags" id="update" method="post" class="form-inline">
            <div class="form-group mb-2">
            Voeg een tag aan de website:
                <input type="hidden" name="addtag" value="true">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input name="tag" type="text" class="form-control" id="inputPassword2" placeholder="Tagnaam!" required>
            </div>
            <button type="submit" value="submit" name="submit" class="btn btn-primary mb-2">Verzend</button>
        </form>
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
	$newaddedtag = mysqli_real_escape_string($dbConnection, $_POST["tag"]);	
	if ($Loggedin) {
		if (isset($_POST["submit"])){
            $sqladdtag = "INSERT INTO tags (`tagnaam`) VALUES ('$newaddedtag')";
            $insertaddtag = mysqli_query($dbConnection, $sqladdtag);
            if ($insertaddtag) {
                echo "<div class='alert alert-success' role='alert'>";
                echo "Tag toegevoegd";
                echo "</div>";
                Customlog("Add-Tag", "log", "Admin $LoggedinID successfully added tag $newaddedtag.");
                ?>
                <script type="text/javascript">
                    window.setTimeout(function(){
                        // Move to a new location
                        window.location.href = "/admin/?page=tags";
                    }, 2500);
                </script>
                <?php
            } else {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "Tag kon niet worden toegevoegd.";
                echo "</div>";
                Customlog("Add-Tag", "error", "Admin $LoggedinID tried adding a tag. The query failed.");
                ?>
                <script type="text/javascript">
                    window.setTimeout(function(){
                        // Move to a new location
                        window.location.href = "/admin/?page=tagss";
                    }, 2500);
                </script>
                <?php
            }       
		}
	}
}
?>

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