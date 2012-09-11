<?php

require_once("../sdk/php/src/facebook.php");

$config = array();
$config['appId'] = '256981411089999';
$config['secret'] = '93a3a1984909cb1b767900f56553ce54';
$config['fileUpload'] = false; // optional

$facebook = new Facebook($config);

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array(
            'scope' => 'read_stream' // Permissions goes here
           ) 
        );
}

// This call will always work since we are fetching public data.
$feed = $facebook->api('/me/feed');
print_r($feed);
/*

<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your Stream (/me/stream)</h3>
      <pre><?php print_r($feed); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
  </body>
</html>

*/

?>