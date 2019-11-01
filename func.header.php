
    <?php
      // Check for config
      require "src/config.php";

      // Include all important functions
      require "src/functions.php";

      //Check database connection:
      $dbConnection = databaseConnect();

      //Set errors in the database and errorfile
      set_error_handler("CustomErrorHandling");

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
      } else {
        $_SESSION['notice'] = "You are not logged in";
        $Loggedin = false;
        $LoggedinID = "";
        $LoggedinUsermail = "";
        $LoggedinUsername = "";
        $LoggedinUserrole = "";
        $LoggedinVerified = "";
        $LoggedinGebanned = "";
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
    ?>
  <html lang="en" class="no-js">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="favicon.ico">

      <!-- Bootstrap core CSS -->
      <link href="/src/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="/src/css/jumbotron.css" rel="stylesheet">

      <!-- Our custom css -->
      <link href="/src/css/stylesheet.css" rel="stylesheet">

      <!-- NewMenu --> 
	<link rel="stylesheet" href="/src/css/menu.css"> <!-- Resource style -->
	<script src="/src/js/modernizr.js"></script> <!-- Modernizr -->

	<header>
		<div class="cd-logo"><a href="/"><img src="/src/img/cd-logo.svg" alt="Logo"></a></div>

		<nav class="cd-main-nav-wrapper">
			<ul class="cd-main-nav">
				<li><a href="/">Homepage</a></li>
				<li><a href="/upload/">Upload</a></li>
				<li><a href="/tags.php">Tags</a></li>
				<li>
					<a href="#0" class="cd-subnav-trigger"><span>Account</span></a>

					<ul>
						<li class="go-back"><a href="#0">Menu</a></li>
						<li><a href="/account/login.php">Log-in</a></li>
						<li><a href="/account/">Account</a></li>
						<li><a href="/upload/">Upload</a></li>
            <li><a href="/support.php">Support</a></li>
            <li><a style="color: red;" href="?logout='1'">Log-uit</a></li>
						<li><a href="#0"  class="placeholder">Placeholder</a></li>
					</ul>
				</li>
			</ul> <!-- .cd-main-nav -->
		</nav> <!-- .cd-main-nav-wrapper -->
		
		<a href="#0" class="cd-nav-trigger"><span></span></a>
	</header>
	<!-- main content starts here -->
	<main class="cd-main-content">
		
