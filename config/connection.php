<?php
declare(strict_types=1);

return [
    'credentials' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'db' => 'sakila',
        'port' => '3306',
        'user' => 'root',
        'password' => ''
    ],
    'options' => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ],
];
