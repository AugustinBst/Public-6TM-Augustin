<?php

require 'vendor/autoload.php';

use Symfony\Component\Routing\RouteCollectionBuilder;

try {
    $client = new MongoDB\Client("mongodb+srv://valentinperon2004:aQC77OoHWzODS2VV@cluster0.6kugulc.mongodb.net/");
    $db = $client->selectDatabase('trombimania');
    $collection = $db->selectCollection('collaborateurs');

    echo 'Connected to MongoDB successfully';

} catch (MongoDB\Driver\Exception\ConnectionException $err) {
    echo 'Failed to connect to MongoDB: ' . $err->getMessage();
}

$routes = new RouteCollectionBuilder();

$routes->add('/users/{full_name}', 'GET', 'App\Controller\UserController::getObject');
$routes->add('/users', 'POST', 'App\Controller\UserController::addUser');
$routes->add('/users/{full_name}', 'PUT', 'App\Controller\UserController::editUser');
$routes->add('/users/{full_name}', 'DELETE', 'App\Controller\UserController::deleteUser');
