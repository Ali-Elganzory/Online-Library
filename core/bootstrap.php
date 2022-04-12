<?php


require_once 'helpers.php';


App::bind("config", require 'config.php');


App::bind(
    "database",
    Connection::make(
        App::get("config")["database"],
    ),
);
