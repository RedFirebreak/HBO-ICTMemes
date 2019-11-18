<?php
require "../func.header.php";
    unset($_SESSION['discordloggedin']);
    unset($_SESSION['discordallowed']);
    unset($_SESSION['discordname']);
    unset($_SESSION['discordcode']);
    unset($_SESSION['oauth2state']);
    unset($_SESSION['discordtoken']);
require "../func.footer.php";
?>