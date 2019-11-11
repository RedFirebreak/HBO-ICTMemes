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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <link href="css/styles.css" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/03fd3b0aa1.js" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-html5-1.6.1/fh-3.1.6/sl-1.3.1/datatables.min.css" />

    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-html5-1.6.1/fh-3.1.6/sl-1.3.1/datatables.min.js">
    </script>


</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/">HBO-ICTMemes Admin page</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/admin/">Dashboard</a></li>
                    <li><a href="/">Go back </a></li>
                </ul>
            </div>
        </div>
    </nav>
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
                    <li><a href="?page=votes">Upvote/Downvotes</a></li>
                    <li><a href="?page=reported">Geraporteerde memes/comments</a></li>
                    <li><a href="?page=comments">Comments</a></li>
                    <li><a href="?page=verification">Emailverificatie</a></li>
                    <li><a href="?page=errors">Errors</a></li>
                </ul>
            </div>
            <!--/span-->

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

                <footer>
                    <p class="pull-right">©2019 HBO-ICTMemes</p>
                </footer>

                <!-- script references 
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
                <script src="js/bootstrap.min.js"></script>
                <script src="js/scripts.js"></script>
</body>

</html>