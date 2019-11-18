<?php
// Check the important stuff from the session
      session_start(); 

      if (!isset($_SESSION['loggedin'])) {
        $_SESSION['loggedin'] = false;
      }


      if ($_SESSION['loggedin'] == true) {
        //Set variables
        $Loggedin = $_SESSION['loggedin'];
        $LoggedinID = $_SESSION['userid'];
        $LoggedinUsermail = $_SESSION['usermail'];
        $LoggedinUsername = $_SESSION['username'];
        $LoggedinUserrole = $_SESSION['userrole'];
        $LoggedinVerified = $_SESSION['is_verified'];
        $LoggedinGebanned = $_SESSION['banned'];

        $discordloggedin = $_SESSION['discordloggedin'];
        $discordadminallowed =  $_SESSION['discordallowed'];
        $discordname = $_SESSION['discordname'];

      } else {
        $_SESSION['notice'] = "You are not logged in";
        $Loggedin = false;
        $LoggedinID = "";
        $LoggedinUsermail = "";
        $LoggedinUsername = "";
        $LoggedinUserrole = "";
        $LoggedinVerified = "";
        $LoggedinGebanned = "";
        $LoggedinSchool = "";

        $discordloggedin = "";
        $discordadminallowed =  "";
        $discordname = "";
      }

      // To logout from any location
      if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['userid']);
        unset($_SESSION['usermail']);
        unset($_SESSION['username']);
        unset($_SESSION['userrole']);
        unset($_SESSION['is_verified']);
        unset($_SESSION['banned']);
        unset($_SESSION['schoolnaam']);
        unset($_SESSION['discordloggedin']);
        unset($_SESSION['discordallowed']);
        unset($_SESSION['discordname']);
        unset($_SESSION['discordtoken']);

        header('Refresh: 0; url=/');
      }

// First check of the user is logged in
if (!$Loggedin) {
  //Er is niemand ingelogd!
  require ("notallowed.php");
  exit;
}
// Then check if the user is allowed
if (!$LoggedinUserrole == 'admin' OR !$LoggedinUserrole == 'uber-admin' OR $LoggedinUserrole == "user") {
  //Er is geen admin ingelogd, maar een user
  require ("notallowed.php");
  exit;
}

// Check if this user has te right discord role
if (!$discordadminallowed) {
    //Er is geen admin ingelogd, maar een user
    require ("discordnotallowed.php");
    exit;
  }

// When we are allowed! Continue
require ("func.adminheader.php");
?>

<!-- html + navbar now! -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HBO-ICTMemes Adminpanel</title>

    <!-- Datatables, Jquery, bootstrap -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.css" />
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.js">
    </script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>HBO-ICTMemes Adminpanel</h3>
            </div>

            <ul class="list-unstyled components">
                <p><?php echo "Hallo $LoggedinUsername <br>[$LoggedinUserrole]"?></p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="/admin/">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">Analytics[WIP]</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Overzichten</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="?page=users">Users</a></li>
                        <li><a href="?page=schooladmins">Scholen en Schooladmins</a></li>
                        <li><a href="?page=memes">Memes</a></li>
                        <li><a href="?page=tags">Tags</a></li>
                        <li><a href="?page=support">Support</a></li>
                        <li><a href="?page=votes">Upvote/Downvotes</a></li>
                        <li><a href="?page=reported">Gerapporteerde memes/comments</a></li>
                        <li><a href="?page=comments">Comments</a></li>
                        <li><a href="?page=verification">Emailverificatie</a></li>
                        <li><a href="?page=error">Errors</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="/" class="article">Terug naar de website</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content" class='col-md-10'>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/admin/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">Terug naar site</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- Start the content here! -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php // Check welke pagina naar voren moet komen
                        if (!empty($_GET)) {
                            switch ($_GET['page']) {
                            case 'users':
                                require("func.users.php");
                                break;
                            case 'schooladmins':
                                require("func.schooladmin.php");
                                break;
                            case 'memes':
                                require("func.meme.php");
                                break;
                            case 'tags':
                                require("func.tags.php");
                                break;
                            case 'support':
                                require("func.support.php");
                                break;
                            case 'votes':
                                require("func.votes.php");
                                break;
                            case 'reported':
                                require("func.reported.php");
                                break;
                            case 'comments':
                                require("func.comments.php");
                                break;
                            case 'verification':
                                require("func.verification.php");
                                break;
                            case 'error':
                                require("func.error.php");
                                break;
                            case 'deleterow':
                                require("database.deleterow.php");
                                break;
                            case 'editrow':
                                require("database.editrow.php");
                                break;
                            }
                        } else {
                            require("homepage.php");
                        }
                    ?>
                    </div>
                </div>
            </div>
            <!-- End content -->
        </div>
    </div>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>