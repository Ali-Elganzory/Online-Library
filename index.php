<?php

$requestUri = $_SERVER['REQUEST_URI'];

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=online_library", 'root', '1234');
} catch (PDOException $e) {
    die("Couldn't connect to db.");
}


// Router
switch ($requestUri) {
    case '' :
    case '/' :
        require 'index.view.php';
        break;
    case '/book_details' :
        require 'pages/book_details/book_details.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/pages/not_found/404.php';
        break;
}


/**
 * - initial setup
 * - schema
 * - database population script
 * - pages (front and logic)
 *
 **/