<?php


namespace app\interfaces;


interface RenderInterface
{
    function render($template, $params = []);
}