
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Janine
        Date:       11-10-2019
    */
	
if (!empty($_POST['changeprofpic'])){
	$password = $_POST["password"];
	$passwordencrypted = md5($password);
	
	$sqlPW = "SELECT wachtwoord from user WHERE `user-id` = '$LoggedinID'";
	
	if ($Loggedin){
		$result_password = mysqli_query($dbConnection,$sqlPW);
		$row = mysqli_fetch_assoc($result_password);
		$dbpassword = $row['wachtwoord'];
		
		if ($passwordencrypted != $dbpassword) {
			$temperror = "Het ingevulde wachtwoord is niet correct, vul deze opnieuw in";
		}
		else{
			
		}
	}
	
}
?>

    <!-- Start coding here! :D -->
<form action="/upload/" method="post" enctype="multipart/form-data">
		Selecteer hier je profielfoto (max. grootte is 2 MB): 
		<input type="file" name="profilepic" id="profpic" value="choose a file" ><br>
		Vul hier je wachtwoord in: <input type="password" name="password"><br>
		<button type="submit" value="Submit" name="submit">Submit</button><br>
		<input type="hidden" name="changeprofpic" value="true">
		</form>
<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->