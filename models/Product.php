<?php

namespace app\models;
class Product extends Model
{
    public function __construct($table)
    {
        parent::__construct($table);
    }
    public function renderAll()
    {
        $product = $this->getAll();
        foreach ($product as $prod) {
            echo "
              <h2>Model name: {$prod['product_name']}</h2>
              <h3>Category: {$prod['category_id']}</h3>
              <p>Model description:{$prod['product_description']}</p>
              <p>Model price: {$prod['product_price']}</p>
              <p>views: {$prod['product_views']}</p>
              ";
        }

    }

    public function renderByID($id)
    {
        $product = $this->getById($id);
        echo "<h2>Model name: {$product['product_name']}</h2>
              <p>Model description:{$product['product_description']}</p>
              <p>Model price: {$product['product_price']}</p>
              <p>views: {$product['product_views']}</p>
              ";
    }

    public function addProduct(string $product_name, string $product_description, int $product_price, int $product_views, int $category_id)
    {
        $params = [$product_name, $product_description, $product_price, $product_views, $category_id];
        $this->add($params);
    }

    public function updateProduct(int $id, string $product_name, string $product_description, int $product_price, int $product_views,int $category_id)
    {
        $params = [$product_name, $product_description, $product_price, $product_views, $category_id];
        $this->update($id, $params);
    }

}