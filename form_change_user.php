<!doctype html>
<html>
	<head>
		<title>Change your username</title>
		<h1> This is the page where you can change your chosen username </h1>
		<?php 
			//hier komt fancy php code wanneer ik een database kan gebruiken
		?>
	</head>
	
	<body>
		Current username: <br>
		<br>
		
		To change your username, please use the file below: <br>
		<form id="update" method="post">
			New username: <input type="text" name="username"><br>
			email: <input type="text" name="email"><br>
			password: <input type="text" name="email"><br>
			
			<button type="submit" value="Submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
		</form>
		<br>
		A confirmation email will be sent to your mail, when you've confirmed, the change will be 'permanent'. 
	</body>
</html>