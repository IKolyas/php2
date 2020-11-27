<?php


namespace app\models;

use app\models\Model;

class User extends Model
{
    public int $id;
    public string $login;
    public string $password;

    static function getTableName(): string
    {
        // TODO: Implement getTableName() method.
        return "user";
    }
}