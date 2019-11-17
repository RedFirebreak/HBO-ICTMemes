<!DOCTYPE html>
<html lang="en">

<head>
    <title>HBO-ICTMemes</title>
    <?php
      require "../func.header.php";
    ?>
</head>


<?php
    use RestCord\DiscordClient;

    $provider = new \Wohali\OAuth2\Client\Provider\Discord([
        'clientId' => $config['discordclientid'],
        'clientSecret' => $config['discordclientsecret'],
        'redirectUri' => $config['discordredirecturi']
    ]);

    $options = ['state' => 'CUSTOM_STATE', 'scope' => ['identify', 'email', 'guilds']];

    if (!isset($_GET['code'])) {

    // Step 1. Get authorization code
    $authUrl = $provider->getAuthorizationUrl($options);
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
    }

    // Step 3. (Optional) Look up the user's profile with the provided token
    try {

        $user = $provider->getResourceOwner($token);

        echo '<h2>Resource owner details:</h2>';
        printf('Hello %s#%s id:%s!<br/><br/>', $user->getUsername(), $user->getDiscriminator(), $user->getID());
        $discordusername = $user->getUsername();
        $discordfullname = $discordusername . $user->getDiscriminator();
        
        // Var-dumps the user to an array, for development purposes.
        // $discorduser = var_export($user->toArray($user));

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');

    }
    if ($discordusername) {

    
    $discordusername = $discorduser['username'];
    $discorduserverified = $discorduser['verified'];
    $discorduserid = $discorduser['id'];
    $discorduseremail = $discorduser['email'];
    $discordname = "$discordusername#" . $discorduser['discriminator'];

    echo "<h1>Discord userinfo</h2>";
    echo "Username: $discordusername" . "<br>";
    echo "IsVerified: $discorduserverified" . "<br>";
    echo "ID: $discorduserid" . "<br>";
    echo "Email: $discorduseremail" . "<br>";
    echo "Discordname: $discordname" . "<br>";


    $discordbotid = $config['discordbotid'];
    $discordguildid = $config['discordguildid'];
    $discord = new DiscordClient(['token' => $discordbotid]); // Token is required

    // This gets the guild-member inside of the guild
    //$discorduserroles = $client->guild->getGuildMember(['guild.id' => $discordguildid],['user.id' => $discorduserid]);
    var_dump($discorduserroles);

    // This gets all the roles in de discord, in a big array
    // $roles = $discord->guild->getGuildRoles(['guild.id' => $discordguildid]);
    } else {
        echo "Discord userinfo could not be fetched :(";
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