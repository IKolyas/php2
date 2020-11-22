<?php


namespace app\models;


class Basket extends Model
{
    public int $id;
    public int $product_id;
    public string $product_name;
    public int $product_price;
    public int $quantity;
    public int $sum;
    public static function getTableName(): string

    {
        return "basket";
    }

}