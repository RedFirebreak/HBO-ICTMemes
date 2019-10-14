
<?php
    /*
        [DESCRIPTION]
        The basic form of the support.

        [INFO]
        Author:     Stefan
        Date:       14-10-2019
    */
?>

<form action="/support.php" method="post">

<p>Naam: <input type="text" name="firstname"><br></p>
<p>E-mail: <input type="text" name="mail"></p>
<p>Waarom wilt u contact opnemen:</p>
<select name="onderwerp">
  <option value="login">Log-in problemen</option>
  <option value="upload">Upload problemen</option>
  <option value="vraag">Vragen</option>
  <option value="overig">Overig</option>
</select>

<p>Graag een korte beschrijving:</p>
<textarea name="onderwerp" rows="10" cols="30">
  
</textarea>

<p><input class="btn btn-primary" type="submit" value="Submit"></p>
</form>
