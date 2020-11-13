<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../services/Autoloader.php';
spl_autoload_register([new services\Autoloader(), 'loadClass']);

include_once '../services/dbConfig.php';

$products = new \models\Product($config, 'products');

var_dump($products->getAll());
var_dump($products->renderAll());
var_dump($products->renderByID(95));