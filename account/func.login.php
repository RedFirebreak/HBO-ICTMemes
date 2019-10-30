  <?php
    if (isset($_POST['username'])) {
      $username = mysqli_real_escape_string($dbConnection, $_POST['username']);
      $password = mysqli_real_escape_string($dbConnection, $_POST['password']);

      if (empty($username)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Username moet ingevuld worden";
        echo "</div>";
        return;
      }
      if (empty($password)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Password moet ingevuld worden";
        echo "</div>";
        return;
      }

      $password = md5($password);
      $query = "SELECT `username`, `wachtwoord` FROM user WHERE username='$username' AND wachtwoord='$password'";
      $results = mysqli_query($dbConnection, $query);

      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        echo "<div class='alert alert-success' role='alert'>";
        echo "Success! Je bent nu ingelogd. Over 3 seconden wordt je doorgestuurd naar de homepagina.";
        echo "</div>";
        header("Refresh:3; url=../index.php");
      } else {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "Username of password combinatie niet correct. Probeer het opnieuw.";
        echo "</div>";
        return;
      }
    }
    ?>