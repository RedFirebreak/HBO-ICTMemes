<?php
    /*
        [DESCRIPTION]
        This file does the registering and such.

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>

<form method="post" action="register.php">

    <p>Username<br>
        <input type="text" name="username" required></p>

    <p>Email<br>
        <input type="email" name="email" required></p>

    <p>School (Om school specifieke memes te zien!)<br>
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
        <p>

            <p>Password<br>
                <input type="password" id="password_1" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    required></p>
            <div class="col-md-6" id="message">
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>


            <p>Confirm password<br>
                <input type="password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required></p>

            <?php echo recaptchaform ();?>
            <button type="submit" class="btn btn-primary" name="reg_user">Register</button>

            <p>
                Al een account? <a href="login.php">Log hier in!</a>
            </p>
</form>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->