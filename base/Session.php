<?php


namespace app\base;


class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function set(string $key, array $value)
    {
        $_SESSION[$key] = $value;
    }

    public function empty($key)
    {
        return empty($_SESSION[$key]);
    }

    public function exists($key)
    {
        return isset($_SESSION[$key]);
    }
    public function delete($key)
    {
        unset($_SESSION[$key]);
    }
}