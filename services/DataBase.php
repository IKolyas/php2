<?php


namespace services;


class DataBase
{
    static string $host;
    static string $login;
    static string $password;
    static string $db;
    public function __construct(array $config)
    {
        self::$host = $config['host'];
        self::$login = $config['login'];
        self::$password = $config['password'];
        self::$db = $config['db'];

    }

    static function getConnection()
    {

        static $connection = null;
        if (is_null($connection)) {
            $connection = mysqli_connect(
                self::$host,
                self::$login,
                self::$password,
                self::$db
            );
        }

        return $connection;
    }

    public function getOne($sql)
    {
        return $this->queryAll($sql)[0];
    }

    public function queryAll($sql)
    {
        $result = mysqli_query($this::getConnection(), $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function execute($sql)
    {
        $result = mysqli_query($this::getConnection()(), $sql);
        return mysqli_affected_rows($this::getConnection());
    }


}