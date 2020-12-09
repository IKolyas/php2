<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

$config = include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
\app\base\Application::getInstance()->run($config);
