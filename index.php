<?php

$requestUri = $_SERVER['REQUEST_URI'];

// Router
switch ($requestUri) {
    case '' :
    case '/' :
        require 'index.view.php';
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