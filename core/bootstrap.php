<?php


$config = require_once 'config.php';

require_once 'core/router.php';
require_once 'core/database/Connection.php';
require_once 'core/database/QueryBuilder.php';

return new QueryBuilder(
    Connection::make(
        $config["database"]
    )
);
