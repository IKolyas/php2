<?php
define('DB', [
    'driver' => 'mysql',
    'host' => 'localhost',
    'login' => 'root',
    'password' => 'root',
    'db' => 'products',
    'charset' => 'utf8'
]);

define('ROOT_DIR', realpath( __DIR__ . '/../') . '/');
define('VIEWS_DIR', ROOT_DIR . 'views/');