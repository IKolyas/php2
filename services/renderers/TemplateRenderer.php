<?php

namespace app\services\renderers;

use app\interfaces\RenderInterface;

class TemplateRenderer implements RenderInterface
{
    public function render($template, $params = []) {
        ob_start();
        $templatePath = $_SERVER['DOCUMENT_ROOT'] . '/../views/' . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}