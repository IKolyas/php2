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
            'db_driver' => 'mysql',
            'host' => '127.0.0.1',
            'login' => 'van4ik',
            'password' => 'password',
            'database' => 'education_site_db',
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