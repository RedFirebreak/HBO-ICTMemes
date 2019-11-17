
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>

    <!-- Start coding here! :D -->
	<head>
		<meta charset="utf-8">
		<title>Upload</title>
	</head>
	
	<body>
		
		<form action="/upload/" method="post" enctype="multipart/form-data">
		<p>Selecteer hier je meme (max. grootte is 2 MB):</p>
		<input type="file" name="meme" id="meme" value="choose a file" >

		<p>Voer een naam voor de meme in:</p>
		<input type="text" name="name" id="name">

		<p>Deze meme is voor:</p>
		<select name="school" required>
		<option value='geen'>Iedereen</option>
		<option value='<?php echo $LoggedinSchool?>'>Alleen mijn school</option>
		</select>

		<p>Selecteer de tags voor je meme:</p>
		<p>Filter tags! (Hoofdletter gevoelig):</p>
		<input id="search_input" placeholder="Type to filter"><br>
		<select name="tags" id="theList" class="List" required>
			<?php
				//tags ophalen
					//query opstellen
					$query = "select tagnaam, `tag-id` id from tags order by 1";
					$result = $dbConnection->query($query);
					while ($record = mysqli_fetch_assoc($result))
					{
						$tagnaam = $record['tagnaam'];
						$tagid = $record['id'];

						if ($tagnaam == 'AdminPost'){
							if ($LoggedinUserrole == 'admin' || $LoggedinUserrole == 'uber-admin') {
								echo "<option value='$tagid'>$tagnaam</option>";
							}
						} else {
							echo "<option value='$tagid'>$tagnaam</option>";
						}
					}
			?>
		</select>
		</ul><br><br>
		<?php echo recaptchaform ();?>
		<input type="submit" name="submit" value="Opsturen">
		</form>
			<script type="text/javascript">
			$(document).ready(function () {
				//copy options
				var options = $('#theList option').clone();
				//react on keyup in textbox
				$('#search_input').keyup(function () {
				var val = $(this).val();
				$('#theList').empty();
				//take only the options containing your filter text or all if empty
				options.filter(function (idx, el) {
					return val === '' || $(el).text().indexOf(val) >= 0;
				}).appendTo('#theList');//add it to list
				});
			});
			</script>
	</body>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->