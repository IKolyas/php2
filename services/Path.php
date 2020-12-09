<?php


namespace app\services;


class Path
{
    public function redirect(string $action){
        header("Location: {$action}");
    }
}