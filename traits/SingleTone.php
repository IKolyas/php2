<?php


namespace app\traits;


trait SingleTone
{

    static $instance = null;

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function __construct()
    {

    }

    protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    protected function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

}