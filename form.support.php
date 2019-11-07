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
    <td><p>Selecteer uw school</p></td>
    <td><select name="school">
      <option value='geen'>Geen</option>
      
        <?php
            // Query voor alle schoolnamen, en vervolgens ze in een dropdown zetten
            $sql = "SELECT schoolnaam s FROM school ORDER by 1;";
            $result = $dbConnection->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["s"]. "'>" . $row["s"] . "</option>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </select><td>

    <tr>
      <td><p>Graag een korte beschrijving: * </p></td>
      <td><textarea name="beschrijving" rows="4" cols="22" maxlength="500" required> </textarea></td>
    </tr>

    <tr>
      <td><?php echo recaptchaform ();?></td>
    </tr>
    
    <tr>
      <td><p><input class="btn btn-primary" type="submit" value="Submit"></p></td>
    </tr>
  <table>
</form>
