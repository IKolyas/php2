<?php

use app\models\Order;

include $_SERVER['DOCUMENT_ROOT'] . '/../config/main.php';
include ROOT_DIR . 'services/Autoloader.php';
spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$product = (new app\models\Product('products'));
$product->addProduct('HPP', 'COLCO', 3000, 30, 1);
$product->renderAll();
$product = (new app\models\Product('products'))->renderByID(95);
$category = (new app\models\Category('category'))->renderAll();
$orders= (new Order('order'))->renderAll();
$users = (new app\models\Users('user'))->renderAll();
//var_dump($product);