
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
$google_client->setClientId('470683448537-cfm97rgeivk36c6n354bsmj0sedtppol.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/MeshVigor/login_form.php');
$google_client->setRedirectUri('http://localhost/MeshVigor/signup_form.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>