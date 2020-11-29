<?php

namespace app\models;

use app\interfaces\ModelInterface;
use app\services\DataBase;

abstract class Model implements ModelInterface
{
    protected $dataBase;
    protected string $tableName;

    public function __construct()
    {
        $this->dataBase = DataBase::getInstance();
        $this->tableName = static::getTableName();
    }

    /**
     * @return mixed
     */
    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getQuery($sql, []);
    }

    public static function getBy($val, $col = 'id')
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$col} = :val";
        return static::getQuery($sql, [':val' => $val])[0];
    }

    public static function add(array $params)
    {
        $tableName = static::getTableName();
        $paramsList = [];
        $col = [];
        foreach ($params as $key => $val) {
            $paramsList[":{$key}"] = $val;
            $col[] = "`{$key}`";
        }
        $paramsValue = implode(',', array_keys($paramsList));
        $col = implode(',', $col);
        $sql = "INSERT INTO {$tableName} ({$col}) VALUES ({$paramsValue})";
        static::save($sql, $paramsList);

    }

    public static function update(array $params)
    {
        $tableName = static::getTableName();
        $paramsList = [];
        $col = [];
        foreach ($params as $key => $val) {
            $paramsList[":{$key}"] = $val;
            if ($key !== 'id') {
                $col[] = "`$key`" . '=' . ":{$key}";
            }
        }
        $col = implode(', ', $col);
        $sql = "UPDATE {$tableName} SET {$col} WHERE id = :id";
        static::save($sql, $paramsList);
    }

    public static function delete(int $id)
    {
        // TODO: Implement delete() method.
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        static::save($sql, [':id' => $id]);
    }

    public static function save(string $sql, array $params = [])
    {
        // TODO: Implement save() method.
        return DataBase::getInstance()->execute($sql, $params);
    }

    protected static function getQuery($sql, $params = [])
    {
        return DataBase::getInstance()->queryAll($sql, $params, get_called_class());
    }


}
