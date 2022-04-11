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
