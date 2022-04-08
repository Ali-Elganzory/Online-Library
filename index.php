<?php

// Bootstrap and get database handle.
$database = require 'core/bootstrap.php';

$router = new Router;

require_once 'routes.php';

$request_url = parse_url($_SERVER['REQUEST_URI']);
$request_uri = trim($request_url['path'], '/');
require $router->direct($request_uri);
