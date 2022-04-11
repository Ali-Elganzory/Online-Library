<?php

// Autoloading
require_once 'vendor/autoload.php';

// Bootstrap.
require 'core/bootstrap.php';

// Direct request.
require Router::load('routes.php')
    ->direct(
        Request::uri(),
        Request::method()
    );
