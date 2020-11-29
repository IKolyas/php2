<?php


namespace app\models;


class User extends Model
{
    public string $id;
    public string $login;
    public string $password;


    static function getTableName(): string
    {
        // TODO: Implement getTableName() method.
        return 'user';
    }
}