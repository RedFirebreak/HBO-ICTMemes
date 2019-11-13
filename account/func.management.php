<?php
    /*
        [DESCRIPTION]
        This file does (something).

        [INFO]
        Author:     Stef
        Date:       11-10-2019
    */
?>
<div style="color: #000" class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="accordion3">
                <div class="card">
                    <div class="card-header" id="heading3-1">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse3-1"
                                aria-expanded="false" aria-controls="collapseOne">
                                Verander wachtwoord
                            </button>
                        </h2>
                    </div>
                    <div id="collapse3-1" class="collapse" aria-labelledby="heading3-1" data-parent="#accordion3">
                        <div class="card-body">
                        <p><b>Vul de onderstaande info in om je wachtwoord te veranderen</b></p>
                            <br>
                            <?php require('form.changepassword.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading3-2">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse3-2" aria-expanded="false" aria-controls="collapseTwo">
                                Verander persoonlijke info
                            </button>
                        </h2>
                    </div>
                    <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion3">
                        <div class="card-body">
                            <p><b>Vul de onderstaande info in om je persoonlijke info te veranderen</b></p>
                            <br>
                            <?php require('form.changepersonal.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading3-3">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse3-3" aria-expanded="false" aria-controls="collapseThree">
                                Verander Username
                            </button>
                        </h2>
                    </div>
                    <div id="collapse3-3" class="collapse" aria-labelledby="heading3-3" data-parent="#accordion3">
                        <div class="card-body">
                            <p><b>Vul de onderstaande info in om je username te veranderen</b></p>
                            <br>
                            <?php require('form.changeusername.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading3-4">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapse3-4" aria-expanded="false" aria-controls="collapseThree">
                                Verander profielfoto
                            </button>
                        </h2>
                    </div>
                    <div id="collapse3-4" class="collapse" aria-labelledby="heading3-4" data-parent="#accordion4">
                        <div class="card-body">
                            <p><b>Vul de onderstaande info in om je profielfoto te veranderen</b></p>
                            <br>
                            <?php require('form.changeprofpic.php'); ?>
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($temperror)) {
                    echo "<div class='alert alert-danger' role='alert'>";
                    echo $temperror;
                    echo "<a href'/account/'> Probeer het opnieuw</a>";
                    echo "</div>";
                    echo "<br>";
                    }
                if (!empty($tempsuccess)) {
                    echo "<div class='alert alert-success' role='alert'>";
                    echo "$tempsuccess";
                    echo "</div>";
                    echo "<br>";
                    }
                ?>
                <!-- If user is admin -->
                <?php require('func.isadmin.php'); ?>
                <!-- This file is going to be required on a page. No need to put ending or starting html tags! -->
