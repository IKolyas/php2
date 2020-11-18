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

    public function add(array $params) {
//        $params = implode(',', $params);
        $sql = "INSERT INTO {$this->tableName} (product_name, product_description, product_price, product_views, category_id ) VALUES :params";
        return $this->dataBase->execute($sql, [':params' => $params]);
    }
    public function update(int $id, array $params) {
        $params = implode(',', $params);
        $sql = "UPDATE {$this->tableName} SET (:params) WHERE id = :id";
        return $this->dataBase->execute($sql, [':id' => $id, ':params' => $params]);
    }

}
