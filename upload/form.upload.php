
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
		
		<form action="/hbo-ictmemes/upload/uploaded.php" method="post" enctype="multipart/form-data">
		<p>Insert your meme here:</p>
		<input type="file" name="meme" id="meme">
		<p>Insert the name of your meme:</p>
		<input type="text" name="name">
		<p>Select the tags for your meme:</p>
		
		<?php
			//tags ophalen
				//query opstellen
				$query = "select tagnaam from tags order by 1";
				$result = $dbConnection->query($query);
				/*<select name="tags">
				{
					echo "<option value={$record['tagnaam']}>{$record['tagnaam']}</option>";
				}*/
				while ($record = mysqli_fetch_assoc($result))
				{
					echo "<input type=checkbox name=tags[] value={$record['tagnaam']}> {$record['tagnaam']} <br>";
				}
			
		?>
			
		</select><br><br>
		<input type="submit" name="submit" value="submit">
		</form>
		<?php
		/*handige manier om tags te selecteren is nog nodig
		ook belangrijk: niet vergeten te registreren van welke school de user komt
		*/
		?>
	</body>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->