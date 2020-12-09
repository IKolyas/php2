<?php

return [
    'root_dir' => realpath( __DIR__ . '/../') . "/",
    'views_dir' => realpath( __DIR__ . '/../') . "/views/",
    'vendor_dir' => realpath( __DIR__ . '/../') . "/vendor/",
    'default_controller' => 'product',
    'controller_namespace' => 'app\controllers\\',
    'components' => [
        'request' => [
            'class' => \app\base\Request::class,
        ],
        'session' => [
            'class' => \app\base\Session::class,
        ],
        'renderer' => [
            'class' => \app\services\renderers\TemplateRenderer::class,
        ],
        'db' => [
            'class' => \app\services\DataBase::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'root',
            'database' => 'php2020',
            'charset' => 'utf8'
        ],
        'product' => [
            'class' => \app\models\repositories\ProductRepository::class,
        ],
        'basket' => [
            'class' => \app\models\repositories\BasketRepository::class,
        ],
        'users' => [
            'class' => \app\models\repositories\UserRepository::class,
        ]
    ]
];