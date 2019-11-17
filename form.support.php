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
    <p>Naam: * </p>
    <input type="text" name="naam" required>

    <p>E-mail: *</p>
    <input type="text" name="mail" required>

    <p>Waarom wilt u contact opnemen: </p>
    <select name="onderwerp">
        <option value="login">Log-in problemen</option>
        <option value="login">Gebanned Account</option>
        <option value="upload">Upload problemen</option>
        <option value="vraag">Vragen</option>
        <option value="overig">Overig</option>
    </select>

    <p>Selecteer uw school</p>
    <select name="school">
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
    </select>

    <p>Graag een korte beschrijving: * </p>
    <textarea name="beschrijving" rows="4" cols="22" maxlength="500" required> </textarea>

    <?php echo recaptchaform();?>
    <br>
    <input class="btn btn-primary" type="submit" value="Submit">

    <table>
</form>