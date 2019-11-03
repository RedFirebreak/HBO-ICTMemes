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
  <table>
    <tr>
      <td><p>Naam: * </p></td>
      <td><input type="text" name="naam" required></td>
    </tr>
    <tr>
      <td><p>E-mail: *</p></td>
      <td><input type="text" name="mail" required></td>
    </tr>
    <tr>
      <td><p>Waarom wilt u contact opnemen: </p></td>
      <td><select name="onderwerp">
          <option value="login">Log-in problemen</option>
          <option value="login">Gebanned Account</option>
          <option value="upload">Upload problemen</option>
          <option value="vraag">Vragen</option>
          <option value="overig">Overig</option>
        </select></td>
    </tr>
    <tr>
      <td><p>Graag een korte beschrijving: * </p></td>
      <td><textarea name="beschrijving" rows="4" cols="50" maxlength="500" required> </textarea></td>
    </tr>

    <tr>
      <td><?php echo recaptchaform ();?></td>
    </tr>
    
    <tr>
      <td><p><input class="btn btn-primary" type="submit" value="Submit"></p></td>
    </tr>
  <table>
</form>
