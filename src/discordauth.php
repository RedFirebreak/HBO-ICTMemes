<!DOCTYPE html>
<html lang="en">

<head>
    <title>wut</title>
    <?php
      require "../func.header.php";
    ?>
</head>


<?php
use RestCord\DiscordClient;
// Get configdata
      // Get key from config
      $config  = checkpathtosrc();
      $config .= "config.php";
      require "$config";
      $key = $config['recaptchakey'];

$provider = new \Wohali\OAuth2\Client\Provider\Discord([
    'clientId' => $config['discordclientid'],
    'clientSecret' => $config['discordclientsecret'],
    'redirectUri' => 'http://localhost/src/discordauth.php'
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
        //var_export($user->toArray());
        $discorduser = $user->toArray();

        // Set variables!
        $discordusername = $discorduser['username'];
        $discorduserverified = $discorduser['verified'];
        $discorduserid = (int) $discorduser['id'];
        $discorduseravatar = $discorduser['avatar'];
        $discorduseremail = $discorduser['email'];
        $discordname = "$discordusername#" . $discorduser['discriminator'];

    } catch (Exception $e) {
        // Failed to get user details
        exit('Oh dear...');

    }
}
if ($discordusername) {
    echo "<h1>Discord userinfo</h2>";
    echo "Username: $discordusername" . "<br>";
    echo "IsVerified: $discorduserverified" . "<br>";
    echo "ID: $discorduserid" . "<br>";
    echo "Email: $discorduseremail" . "<br>";
    echo "Avatar: $discorduseravatar" . "<br>";
    echo "Discordname: $discordname" . "<br>";

    // Now that we have all the user info from discord itself. We can check with our installed bot if this user has special roles
        // Setup Restcord to ask our bot something

        $discordbottoken = $config['discordbottoken'];
        $discord = new DiscordClient(['token' => $discordbottoken]);

        // Check which guild(server) we have to check something for, then get the user from the guild
        $discordguildid = $config['discordguildid'];
        $discordmember = $discord->guild->getGuildMember(['guild.id' => $discordguildid, 'user.id' => $discorduserid]);

        // Convert from object to array
        $discordmember = (array)$discordmember;
        $discordmemberroles = (array)$discordmember['roles'];

        // Check if the user is administrator
        $discordadminid = explode(", ", $config['allowedrole']);
        $isdiscordadmin = in_array_any($discordadminid, $discordmemberroles);

        if ($isdiscordadmin) {
            echo "User is an admin WOOP!!";
        } else {
            echo "User is not an admin";
        }

} else {
    echo "Userinfo could not be fetched :(";
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