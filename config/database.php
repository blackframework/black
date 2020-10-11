<?php

return [
    'default' => 'mysql',

    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'homestead'),
            'username' => env('DB_USERNAME', 'homestead'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : []
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'oracle' => [
            'driver'        => 'oracle',
            'tns'           => env('DB_TNS', ''),
            'host'          => env('DB_HOST', ''),
            'port'          => env('DB_PORT', '1521'),
            'database'      => env('DB_DATABASE', ''),
            'username'      => env('DB_USERNAME', ''),
            'password'      => env('DB_PASSWORD', ''),
            'charset'       => env('DB_CHARSET', 'AL32UTF8'),
            'prefix'        => env('DB_PREFIX', ''),
            'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
            'edition'       => env('DB_EDITION', 'ora$base'),
        ]
    ]
];
