<?php


namespace app\controllers;

use app\interfaces\RenderInterface;

abstract class Controller
{

    protected string $defaultAction = 'index';
    protected $action;
    protected bool $useLayout = true;
    protected string $layout = 'main';
    protected object $renderer;

    public function __construct(RenderInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new \ErrorException('not Method');
        }
    }

    protected function render($template, $params = [])
    {
        $content = $this->renderer->render($template, $params);
        if ($this->useLayout) {
            return $this->renderer->render(
                "layouts/{$this->layout}",
                ['content' => $content]
            );
        }
        return $content;
    }

}