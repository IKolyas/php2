<?php


namespace app\services;

use app\traits\SingleTone;
use PDO;

include_once '../config/main.php';

class DataBase
{
    use SingleTone;

    public $config;

    private $connection = null;

    public function __construct()
    {
        $this->config = [
            'db_driver' => 'mysql',
            'host' => 'db_server',
            'login' => 'van4ik',
            'password' => 'password',
            'database' => 'education_site_db',
            'charset' => 'utf8'
        ];
    }


    protected function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new PDO (
                $this->buildDsn(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }
        return $this->connection;
    }

    private function buildDsn()
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['db_driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [], string $className = null)
    {
        $pdoStatement = $this->query($sql, $params);
        if (isset($className)) {
            $pdoStatement->setFetchMode(
                \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,
                $className
            );

        }
        return $pdoStatement->fetchAll();
    }

    public function execute(string $sql, array $params = []): int
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function getLastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }


}