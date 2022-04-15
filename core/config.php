<?php

return [
    'database' => [
        'name' => 'online_library',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        ],
    ],
    'authentication' => [
        'JWTHeader' => [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ],
        'exp' => 86_400,
        'privateKey' => '123456',
    ],
];