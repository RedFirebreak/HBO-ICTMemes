
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
		
		<form action="/upload.php" method="post">
		<p>Insert your meme here:</p>
		<input type="text" name="meme">
		<p>Insert the name of your meme:</p>
		<input type="text" name="name">
		<p>Select the tags for your meme:</p>
		<select name="tags">
			
		</select>
		</form>
		<?php
		/*handige manier om tags te selecteren is nog nodig
		ook belangrijk: niet vergeten te registreren van welke school de user komt
		*/
		?>
	</body>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->