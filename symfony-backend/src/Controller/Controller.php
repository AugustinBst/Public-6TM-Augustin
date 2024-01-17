<?php

require 'vendor/autoload.php';

use App\Controller\UserController;
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

$routes->add('/users/{full_name}', 'GET', 'App\Controller\UserController::getUser');
$routes->add('/users', 'POST', 'App\Controller\UserController::addUser');
$routes->add('/users/{full_name}', 'PUT', 'App\Controller\UserController::editUser');
$routes->add('/users/{full_name}', 'DELETE', 'App\Controller\UserController::deleteUser');
/*
$routes->add('/users/{full_name}', 'GET', function (string $full_name) {
    return UserController::getUser($full_name);
});
$routes->add('/users/{full_name}', 'POST', function ($req) {
    return UserController::addUser($req);
});
$routes->add('/users/{full_name}', 'PUT', function (string $full_name, $req) {
    return UserController::editUser($full_name, $req);
});
$routes->add('/users/{full_name}', 'DELETE', function (string $full_name) {
    return UserController::deleteUser($full_name);
});
*/
