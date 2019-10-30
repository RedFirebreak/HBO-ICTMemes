
<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>

<!--
    1. laat de user een nieuw wachtwoord invoeren (kan je kopieren uit registratie. Roep mij(Stefan) als dat niet lukt
    2. Submit de form VIA POST , naar dezelfde pagina (/verify/index.php)
    2. clean de user-input van de POST

    3. Maak een eerste query, die kijkt of de user-id en verificatiecode in de mail overeencomen
      -- De verificatiecode zal in de GET staan(dus niet POST van de form), en kan dus aangeroepen worden met $_GET['verificatiecode'] ofzoiets
    
    4. Komt de informatie overeen, verander het wachtwoord van de user met een tweede query
    5. Informeer de user 

    -->

<!-- This file is going to be required on a page. No need to put ending or starting html tags! -->