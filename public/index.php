<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../config/main.php';
include ROOT_DIR . 'services/Autoloader.php';
include ROOT_DIR . 'services/req.php';
include ROOT_DIR . 'services/userAuth.php';
include_once ROOT_DIR . 'vendor/autoload.php';


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = "app\controllers\\" . ucfirst($controllerName) . "Controller";


if(class_exists($controllerClass)) {

    session_start();
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}