<?php

namespace models;
class Product extends Model
{

    public function renderAll()
    {
        $product = $this->getAll();
        foreach ($product as $prod) {
            echo "<h2>Model name: {$prod['product_name']}</h2>
              <p>Model description:{$prod['product_description']}</p>
              <p>Model price: {$prod['product_price']}</p>
              <p>views: {$prod['product_views']}</p>
              ";
        }

    }

    public function renderByID(int $id)
    {
        $product = $this->getById($id);
        echo "<h2>Model name: {$product['product_name']}</h2>
              <p>Model description:{$product['product_description']}</p>
              <p>Model price: {$product['product_price']}</p>
              <p>views: {$product['product_views']}</p>
              ";
    }

}