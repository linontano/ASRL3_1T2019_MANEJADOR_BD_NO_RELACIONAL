<?php


$session = new SpotifyWebAPI\Session(
    '27c281e255a6496aa530a61e8f03d7b9',
    'a3730dff4de544e5bcc3b2a5531a197d'
);

$session->requestCredentialsToken();
$accessToken = $session->getAccessToken();

// Store the access token somewhere. In a database for example.


// Send the user along and fetch some data!
?>