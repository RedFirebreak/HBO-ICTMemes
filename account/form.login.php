<?php
    /*
        [DESCRIPTION]
        This file handles the login 

        [INFO]
        Author:     Stef
        Date:       29-10-2019
    */
?>

<form action="/account/login.php" method="post">
    <p><b>Username: </b><br>
        <p><input type="text" name="username" required></p>

        <p><b>Password: </b><br>
            <input type="password" name="password" required></p>

        <?php echo recaptchaform ();?>

        <p><input class="btn btn-primary" id="login_user" type="submit" value="Submit"></p>
        <a href="register.php">Nog geen account? Maak er hier 1 aan.</a>

</form>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->