<?php

declare(strict_types=1);

return [
    'db' => [
        'driver' => 'mysql',
        'username' => getenv('MYSQL_USER') ?: 'user',
        'password' => getenv('MYSQL_PASSWORD') ?: 'pass',
        'host' => getenv('MYSQL_HOST') ?: 'db',
        'port' => getenv('MYSQL_PORT') ?: 3306,
        'database' => getenv('MYSQL_DATABASE') ?: 'diary',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_bin',
        'prefix' => '',
    ],
];
