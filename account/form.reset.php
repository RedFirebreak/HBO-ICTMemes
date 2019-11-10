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
    <title>Password Reset</title>
</head>

<body>

    <form action="/account/resetpassword.php" method="post">
        <p>Om weer toegang te krijgen tot je account, vul hieronder je opgegeven e-mailadres en gebruikersnaam in. <br>
            Er zal een e-mail verzonden worden met daarin een link om een nieuw wachtwoord te registreren.</p>
        Gebruikersnaam:<br><input type="text" name="username"><br>
        E-mail:<br><input type="email" name="email"><br>
        <input type="submit" value="send">
    </form>

</body>

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->