<?php

return [

    'paths' => [

        'bootstrap' => 'bootstrap/console.php',
        'migrations'  => 'database/migrations',
        'seeds'       => 'database/seeders',

    ],

    'environments' => [
        'default_database' => env('APP_ENV'),
        'default_migration_table' => 'migrations_table',
        'local' => [
            'adapter' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'name' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'port' => 3306,
            'charset' => 'utf8',
        ],

        'production' => [
            'adapter' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'name' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'pass' => env('DB_PASSWORD'),
            'port' => 3306,
            'charset' => 'utf8',
        ],

        'testing' => [
            'adapter' => 'mysql',
            'host' => env('DB_TESTING_HOST'),
            'name' => env('DB_TESTING_DATABASE'),
            'user' => env('DB_TESTING_USERNAME'),
            'pass' => env('DB_TESTING_PASSWORD'),
            'port' => 3306,
            'charset' => 'utf8',
        ]
    ],
];
