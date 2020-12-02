<?php


namespace app\base;


class Request
{
    protected string $requestString = '';
    protected $controllerName = null;
    protected $actionName = null;
    protected bool $isPost = false;
    protected bool $isGet = true;
    protected bool $isAjax = false;
    protected string $urlPattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<get>.*)#ui";

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        if (preg_match_all($this->urlPattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        }
    }

    public function req(string $params)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method === 'GET') {
            return $this->get($params);
        } else {
            return $this->post($params);
        }
    }

    private function get(string $name)
    {
        return $_GET[$name];
    }

    private function post(string $name)
    {
        return $_POST[$name];
    }

    public function param(string $name)
    {
        return $_REQUEST[$name];
    }

    /**
     * @return null
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return null
     */
    public function getActionName()
    {
        return $this->actionName;
    }
}