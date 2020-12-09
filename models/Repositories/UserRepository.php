<?php


namespace app\models\repositories;


use app\base\Application;
use app\base\Request;
use app\models\User;

class UserRepository extends Repository
{


    public function getTableName(): string
    {
        // TODO: Implement getTableName() method.
        return 'user';
    }

    public function getModelClassName(): string
    {
        // TODO: Implement getModelClassName() method.
        return User::class;
    }
}