<?php


namespace app\models\repositories;


use app\models\Basket;

class BasketRepository extends Repository
{

    public function getTableName(): string
    {
        // TODO: Implement getTableName() method.
        return "basket";
    }

    public function getModelClassName(): string
    {
        // TODO: Implement getModelClassName() method.
        return Basket::class;
    }
}