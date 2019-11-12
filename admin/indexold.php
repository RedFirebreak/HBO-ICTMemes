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
        $LoggedinSchool = $_SESSION['schoolnaam'];
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

// When we are allowed! Continue
require ("func.adminheader.php");
?>

<!-- html + navbar now! -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>HBO-ICTMemes administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link href="css/stylesheet.css" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/03fd3b0aa1.js" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>
 

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">HBO-ICTMemes AdminPanel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/admin/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="/">Back<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<!-- Sidebar  -->
<nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

        <div id="content">
        <!--
        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Info</a></li>
                        <li><a href="#"><?php echo "Hello $LoggedinUsername [$LoggedinUserrole]"?></a></li>
                        <?php
                if ($LoggedinUserrole == 'admin') {
                    echo "<li><a href='#'>Dit admin account ziet alleen gebruikers van de school: $LoggedinSchool.</a></li>";
                }
                ?>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Navigation</a></li>
                        <li><a href="/admin/">Dashboard</a></li>
                        <li><a href="#">Analytics[WIP]</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Overzichten</a></li>
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
                </div>
                /span-->
                <div class="col-sm-9 col-md-10 main">
                    <!--toggle sidebar button for smaller devices (mobile)-->
                    <p class="visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i
                                class="far fa-compass"></i></button>
                    </p>
                    <!-- End html / navbar/ Getting on with it! -->

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

                }
            } else {
                require("homepage.php");
            }
            ?>
        </div> <!-- End content -->
        <footer>
            <p class="pull-right">©2019 HBO-ICTMemes</p>
        </footer>
</body>

</html>