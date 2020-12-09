<?php
namespace app\services;

class Autoloader
{
    private $fileExtension = '.php';

    public function loadClass(string $classname)
    {
        $classname = str_replace('app\\', ROOT_DIR, $classname);
        $filename = realpath($classname . $this->fileExtension);
        if (file_exists($filename)) {
            require $filename;
            return true;
        }
        return false;
    }
}