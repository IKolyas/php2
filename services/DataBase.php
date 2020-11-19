<?php


namespace app\services;

use app\traits\SingleTone;

include_once '../config/main.php';

class DataBase
{
    use SingleTone;

    public array $config = DB;

    /** @var \PDO */
    private ?\PDO $connection = null;


    protected function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO (
                $this->buildDsn(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        }
        return $this->connection;
    }

    private function buildDsn()
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['db'],
            $this->config['charset']
        );
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function getOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute(string $sql, array $params = []): int
    {
        return $this->query($sql, $params)->rowCount();
    }


}