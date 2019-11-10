<!DOCTYPEhtml>
    <?php
    /*
        [DESCRIPTION]
        This file does the bad

        [INFO]
        Author:     Stef
        Date:       6-11-2019
    */
?>

    <html>

    <head>
        <!-- Edit the pagename only -->
        <title>HBO-Memes - NOT ALLOWED</title>
        <?php
        require('../func.header.php'); 
        Customlog("ADMIN - NOWALLOWED", "error", "Somebody tried to access the admin panel, but isnt allowed. (If logged in: [Username: $LoggedinUsermail, Rol: $LoggedinUserrole, ID: $LoggedinID])");
    ?>
    </head>

    <body>

        <!-- Start coding here! :D -->

        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">GEEN RECHTEN</h1>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2></h2><br>

                    <div class='alert alert-danger' role='alert'>
                        Je hebt geen rechten om deze pagina te bekijken. Als je denkt dat dit een fout is, neem contact
                        op met Support. Deze poging is genoteerd en de administrators zijn op de hoogte gebracht. Je
                        wordt automatisch doorgestuurd naar de homepagina.
                    </div>

                </div>
            </div>
        </div>

    </body>

    <footer>
        <?php
    require('../func.footer.php');
    header('Refresh: 10; URL=https://www.hbo-ictmemes.nl');
    ?>
    </footer>

    </html>