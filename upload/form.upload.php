
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
		<p>Selecteer hier je meme:</p>
		<input type="file" name="meme" id="meme" value="choose a file" >
		<p>Voer een naam voor de meme in:</p>
		<input type="text" name="name" id="name">
		<p>Selecteer de tags voor je meme:</p>
		
		<?php
			//tags ophalen
				//query opstellen
				$query = "select tagnaam from tags order by 1";
				$result = $dbConnection->query($query);
				while ($record = mysqli_fetch_assoc($result))
				{
					echo "<input type=checkbox name=tags[] value={$record['tagnaam']}> {$record['tagnaam']} <br>";
				}
			
		?>
			
		</select><br><br>
		<?php echo recaptchaform ();?>
		<input type="submit" name="submit" value="Opsturen">
		</form>
		
	</body>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->