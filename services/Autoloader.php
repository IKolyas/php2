<?php


namespace app\services;


class Autoloader
{

    public function loadClass(string $classname)
    {
        $classname = str_replace('app\\', ROOT_DIR, $classname);
        $filename = realpath($classname . '.php');
        if (file_exists($filename)) {
            include_once $filename;
            return true;
        }
        return false;
    }

}