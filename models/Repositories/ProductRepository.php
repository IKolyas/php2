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

    public function getByCategoryId(int $categoryId)
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE category_id = :id";
        return $this->getQuery($sql, [':id' => $categoryId]);
    }
}