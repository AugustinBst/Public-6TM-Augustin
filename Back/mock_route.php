<?php

function getUserData() {
    return [
        "_id" => "65a53f5285458e4e30a1b61e",
        "nom" => "AHMANE",
        "prenom" => "Hafid",
        "poste" => "Développeur",
        "equipe" => "Pôle AI",
        "agence" => "Rennes",
        "photo_pro" => "https://trombi.6tmphp.fr/images/pro/AHMANE-Hafid.jpg",
        "photo_fun" => "https://trombi.6tmphp.fr/images/fun/AHMANE-Hafid.jpg",
        "nom_prenom" => "AHMANE Hafid"
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($name) {
        $userData = getUserData();

        header('Content-Type: application/json');
        echo json_encode($userData);
        exit;
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Name parameter is required"]);
        exit;
    }
}
