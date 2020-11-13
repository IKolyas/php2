<?php

namespace models;

use services\DataBase as db;

abstract class Model implements ModelInterface
{
    protected object $dataBase;
    protected string $tableName;

    public function __construct(array $config, string $table)
    {
        $this->dataBase = new db($config);
        $this->tableName = $table;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->dataBase->queryAll($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $this->dataBase->getOne($sql);
    }


}
