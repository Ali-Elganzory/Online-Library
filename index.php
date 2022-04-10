<?php

// Bootstrap.
require 'core/bootstrap.php';

// Redirect request.
require Router::load('routes.php')
    ->direct(
        Request::uri(),
        Request::method()
    );
