<?php

//start session on web page

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('700816889066-lsau2q5bt9852gq77f6at8onfuan7idj.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('FCpTXvfvX0lZTXitzFdTnSxR');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/food-order/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>