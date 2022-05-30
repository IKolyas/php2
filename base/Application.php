<?php

namespace app\base;

use app\interfaces\RenderInterface;
use app\models\Basket;
use app\services\DataBase;
use app\traits\SingleTone;

/**
 * Class Application
 * @package app\base
 *
 * @property Request $request;
 * @property DataBase $db;
 * @property Session $session;
 * @property RenderInterface $renderer;
 * @property Basket $basket;
 * @property Application $instance;
 */
class Application
{
    use SingleTone;

    protected $config;
    /** @var ComponentsFactory */
    protected $componentsFactory;
    protected $components;

    public function run(array $config)
    {
        $this->componentsFactory = new ComponentsFactory();
        $this->config = $config;
        $controllerName = $this->request->getControllerName() ?: $this->config['default_controller'];
        $actionName = $this->request->getActionName();

        $controllerClass = $this->config['controller_namespace'] . ucfirst($controllerName) . "Controller";

        if (class_exists($controllerClass)) {
            /** @var \app\controllers\Controller $controller */
            $controller = new $controllerClass($this->renderer);
            try {
                $controller->runAction($actionName);
            } catch (\ErrorException $e) {
                (new \app\controllers\ErrorController($this->renderer))->runAction('notFound');
            }
        }
    }

    public function __get($name)
    {

        if (!isset($this->components[$name])) {

            if ($params = $this->config['components'][$name]) {
                $this->components[$name] = $this->componentsFactory
                    ->createComponent($name, $params);
            } else {
                throw new \Exception("Не найдена конфигурация для компонента {$name}");
            }
        }
        return $this->components[$name];
    }

    public function getConfig()
    {
        return $this->config;
    }


}