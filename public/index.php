<?php

use app\models\Order;

include $_SERVER['DOCUMENT_ROOT'] . '/../config/main.php';
include ROOT_DIR . 'services/Autoloader.php';
spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$product = (new app\models\Product('products'));
$product->addProduct('HPP', 'COLCO', 3000, 30, 1);
$product->updateProduct(2, 'KKKKK', 'BAD prod', 44555, 23);
$product->renderByID(2);
$product->renderAll();

//$category = (new app\models\Category('category'))->renderAll();
//$orders= (new Order('order'))->renderAll();
//$users = (new app\models\Users('user'))->renderAll();