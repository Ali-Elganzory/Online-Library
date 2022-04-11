<?php


$app["config"] = require_once 'config.php';


$app["database"] = new QueryBuilder(
    Connection::make(
        $app["config"]["database"],
    ),
);
