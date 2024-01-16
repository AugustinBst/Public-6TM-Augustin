<?php

require 'vendor/autoload.php';

use App\Controller\UserController;

try {
    $client = new MongoDB\Client("mongodb+srv://valentinperon2004:aQC77OoHWzODS2VV@cluster0.6kugulc.mongodb.net/");
    $db = $client->selectDatabase('trombimania');
    $collection = $db->selectCollection('collaborateurs');

    echo 'Connected to MongoDB successfully';

    $this->GET('/users/{full_name}', function ($full_name) use ($collection) {
        return UserController::get_user($full_name);
    });

    $this->POST('/users/{full_name}', function ($full_name) use ($collection) {
        return UserController::add_user($full_name);
    });

    $this->PUT('/users/{full_name}', function(array $data) use ($collection) {
        return UserController::edit_user($data);
    });

    $this->DELETE('/users/{full_name}', function($full_name) use ($collection) {
        return UserController::delete_user($full_name);
    });

} catch (MongoDB\Driver\Exception\ConnectionException $e) {
    echo 'Failed to connect to MongoDB: ' . $e->getMessage();
}

