<!doctype html>
<html>
	<head>
		<title>Change your personal details</title>
		<h1> This is the page where you can add, change or remove personal details </h1>
		<?php 
			//hier komt fancy php code wanneer ik een database kan gebruiken
		?>
	</head>
	
	<body>
		Current personal details <br>
		First name: <br> 
		Last name: <br>
		Address: <br>
		School: <br>
		<br>
		
		To change your personal details, please use the file below: <br>
		<form id="change" method="post">
			First name: <input type="text" name="first"><br>
			Last name: <input type="text" name="last"><br>
			Address: <input type="text" name="address"><br>
			School: <input type="text" name="school"><br>
			
			<button type="submit" value="Submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
		</form>
	</body>
</html>
