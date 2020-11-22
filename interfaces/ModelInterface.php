<?php


namespace app\interfaces;


interface ModelInterface
{

    static function getTableName() : string;

    static function getAll();

    static function getById(int $id);

    static function add(array $params);

    static function update(array $params);

    static function delete(int $id);

    static function save(string $sql, array $params);
}