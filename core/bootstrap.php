<?php


$app["config"] = require_once 'config.php';

require_once 'core/router.php';
require_once 'core/request.php';
require_once 'core/database/Connection.php';
require_once 'core/database/QueryBuilder.php';

$app["database"] = new QueryBuilder(
    Connection::make(
        $app["config"]["database"],
    ),
);
