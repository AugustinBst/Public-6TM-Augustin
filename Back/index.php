<?php

require 'vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb+srv://valentinperon2004:aQC77OoHWzODS2VV@cluster0.6kugulc.mongodb.net/");
    $db = $client->selectDatabase('trombimania');

    echo 'Connected to MongoDB successfully';
} catch (MongoDB\Driver\Exception\ConnectionException $e) {
    echo 'Failed to connect to MongoDB: ' . $e->getMessage();
}

?>