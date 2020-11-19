<?php

namespace app\models;

use app\interfaces\ModelInterface;
use app\services\DataBase;

abstract class Model implements ModelInterface
{
    public $dataBase;
    protected string $tableName;

    public function __construct(string $table)
    {
        $this->dataBase = DataBase::getInstance();
        $this->tableName = $table;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->dataBase->queryAll($sql);
    }

    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->dataBase->getOne($sql, [':id' => $id]);
    }

    public function add(array $params)
    {

        $paramsList = [];
        $col = [];
        foreach ($params as $key => $val) {
            $paramsList[":{$key}"] = $val;
            $col[] = "`{$key}`";
        }
        $paramsValue = implode(',', array_keys($paramsList)) ;
        $col = implode(',', $col);
        $sql = "INSERT INTO {$this->tableName} ({$col}) VALUES ({$paramsValue})";
        return $this->dataBase->execute($sql, $paramsList);
    }

    public function update(array $params)
    {
        $paramsList = [];
        $col = [];

        foreach ($params as $key => $val) {
            $paramsList[":{$key}"] = $val;
            if ($key!=='id') {
                $col[] = "`$key`" . '=' . ":{$key}";
            }

        }
        $col = implode(', ', $col);
        $sql = "UPDATE `{$this->tableName}` SET {$col} WHERE `id` = :id";
        return $this->dataBase->execute($sql, [$paramsList]);
    }

}
