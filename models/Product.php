<?php

namespace app\models;
class Product extends Model
{

    public int $id;
    public string $product_name;
    public string $product_description;
    public int $product_price;
    public int $category_id;

    public static function getTableName(): string
    {
        return "product";
    }

}