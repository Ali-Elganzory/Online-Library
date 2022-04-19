<?php

return [
    'database' => [
        ...json_decode(
            file_get_contents('config/db.json'),
            associative: true,
        ),
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