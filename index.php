<?php

// Autoloading.
require_once 'vendor/autoload.php';


// Bootstrap.
require_once 'core/bootstrap.php';


// Direct request.
require Router::load('routes.php')
    ->direct(
        Request::uri(),
        Request::method()
    );


/**
 *
 * Examples
 *
 *
 * [Database]
 *
 * Book::all();
 * Book::find(2);
 * Book::where('views', '>=', '5')->limit(2)->get();
 *
 */