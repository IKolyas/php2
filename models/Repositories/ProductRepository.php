<?php


namespace app\models\repositories;


use app\models\Product;

class ProductRepository extends Repository
{
    public function getTableName(): string
    {
        return "products";
    }

    public function getModelClassName(): string
    {
        return Product::class;
    }

}