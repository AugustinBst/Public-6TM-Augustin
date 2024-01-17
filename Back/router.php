<?php

require 'vendor/autoload.php';

use App\Controller\UserController;
use Symfony\Component\Routing\RouteCollectionBuilder;

try {
    $client = new MongoDB\Client("mongodb+srv://valentinperon2004:aQC77OoHWzODS2VV@cluster0.6kugulc.mongodb.net/");
    $db = $client->selectDatabase('trombimania');
    $collection = $db->selectCollection('collaborateurs');

    echo 'Connected to MongoDB successfully';

    $routes = new RouteCollectionBuilder();

    $routes->add('/users/{full_name}', 'GET', function ($full_name) use ($collection) {
        return UserController::get_user($full_name);
    });

    $routes->add('/users/{full_name}', 'POST', function ($full_name) use ($collection) {
        return UserController::add_user($full_name);
    });

    $routes->add('/users/{full_name}', 'PUT', function (array $data) use ($collection) {
        return UserController::edit_user($data);
    });

    $routes->add('/users/{full_name}', 'DELETE', function ($full_name) use ($collection) {
        return UserController::delete_user($full_name);
    });

} catch (MongoDB\Driver\Exception\ConnectionException $err) {
    echo 'Failed to connect to MongoDB: ' . $err->getMessage();
}

