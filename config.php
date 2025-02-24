<?php

//start session on web page
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('921088734009-n72fdf2prr42io7lsr54eh8pakpbq90m.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/dakcom/perfil.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?> 