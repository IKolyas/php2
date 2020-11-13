<?php


namespace services;


class Autoloader
{

     public $paths = [
         'models',
         'services'
     ];

    public function loadClass(string $classname)
    {
        foreach ($this->paths as $dir) {
            $filename = $_SERVER['DOCUMENT_ROOT'] . '/../' . str_replace('\\', '/', $classname) . '.php';
            if (file_exists($filename)) {
                include_once $filename;
            }
        }
        return false;
    }

}