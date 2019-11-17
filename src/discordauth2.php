<!DOCTYPE html>
<html lang="en">

<head>
    <title>wut</title>
    <?php
      require "../func.header.php";
    ?>
</head>


<?php
echo ('Main screen turn on!<br/><br/>');

// Get configdata
      // Get key from config
      $config  = checkpathtosrc();
      $config .= "config.php";
      require "$config";
      $key = $config['recaptchakey'];

$provider = new \Wohali\OAuth2\Client\Provider\Discord([
    'clientId' => $config['discordclientid'],
    'clientSecret' => $config['discordclientsecret'],
    'redirectUri' => 'http://localhost/src/discordauth2.php'
]);

if (!isset($_GET['code'])) {

    // Step 1. Get authorization code
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Step 2. Get an access token using the provided authorization code
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Show some token details
    echo '<h2>Token details:</h2>';
    echo 'Token: ' . $token->getToken() . "<br/>";
    echo 'Refresh token: ' . $token->getRefreshToken() . "<br/>";
    echo 'Expires: ' . $token->getExpires() . " - ";
    echo ($token->hasExpired() ? 'expired' : 'not expired') . "<br/>";

    // Step 3. (Optional) Look up the user's profile with the provided token
    try {

        $user = $provider->getResourceOwner($token);

        echo '<h2>Resource owner details:</h2>';
        printf('Hello %s#%s!<br/><br/>', $user->getUsername(), $user->getDiscriminator());
        var_export($user->toArray());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');

    }
}
?>

<body>
    <div class="text-center">
        </div>
        <?php
        require "../func.footer.php";
    ?>
</body>

</html>