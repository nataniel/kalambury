<?php
return [
    'database' => [
        'driver' => 'pdo_mysql',
        'dbname' => 'kalambury',
        'user' => '******',
        'password' => '******',
        'host' => 'localhost',
        'charset' => 'utf8',
    ],

    /**
     * Base URL for non-http requests and all other cases when
     * the Base URL cannot be determined automatically from $_SERVER
     */
    'base_url' => 'http://www.xpect.pl/kalambury/',
    'ssl_required' => false,

    'show_errors' => false,
];
