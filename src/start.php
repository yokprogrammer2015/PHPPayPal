<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

session_start();

$_SESSION['user_id'] = 1;

require __DIR__ . '/../vendor/autoload.php';

// API
$api = new ApiContext(
    new OAuthTokenCredential(
        'AR6diTL8v0arcxlX3jvDvHTXzY38airtO23XBPP5laiDJfckYGlQDAyBG90IgmbKNO0CSUIESzQjbXyW',
        'EEkWOjK2CADRYGZn2NqAPjnduoy_1V1BncAMJd9Z3aDRagEl3nxmC1-fqKi0xz5Ujg3S8lYdGr8Hoxtj'
    )
);

$api->setConfig([
    'mode' => 'sandbox',
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => false,
    'log.FileName' => '',
    'log.LogLevel' => 'FINE',
    'validation.level' => 'log'
]);

$db = new PDO('mysql:host=localhost;dbname=paypal', 'root', '');

$user = $db->prepare("
    SELECT * FROM users WHERE id = :user_id
");

$user->execute(['user_id' => $_SESSION['user_id']]);

$user = $user->fetchObject();