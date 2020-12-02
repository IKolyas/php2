<?php


namespace app\models\repositories;


use app\services\DataBase;

abstract class Repository
{
    protected $dataBase;
    protected string $tableName;

    public function __construct()
    {
        $this->dataBase = DataBase::getInstance();
        $this->tableName = $this->getTableName();
    }

    /**
     * @return mixed
     */
    public function getAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->getQuery($sql, []);
    }

    public function getBy($val, $col = 'id')
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$col} = :val";
        return $this->getQuery($sql, [':val' => $val])[0];
    }

    public function add(array $params)
    {
        $tableName = $this->getTableName();
        $paramsList = [];
        $col = [];
        foreach ($params as $key => $val) {
            $paramsList[":{$key}"] = $val;
            $col[] = "`{$key}`";
        }
        $paramsValue = implode(',', array_keys($paramsList));
        $col = implode(',', $col);
        $sql = "INSERT INTO {$tableName} ({$col}) VALUES ({$paramsValue})";
        $this->save($sql, $paramsList);

    }

    public function update(array $params)
    {
        $tableName = $this->getTableName();
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
        $this->save($sql, $paramsList);
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        $this->save($sql, [':id' => $id]);
    }

    public function save(string $sql, array $params = [])
    {
        // TODO: Implement save() method.
        return DataBase::getInstance()->execute($sql, $params);
    }

    protected function getQuery($sql, $params = [])
    {
        return DataBase::getInstance()->queryAll($sql, $params, get_called_class());
    }

    abstract public function getTableName(): string;

    abstract public function getModelClassName(): string;

}