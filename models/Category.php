<?php

namespace app\models;
class Category extends Model
{
    public function __construct(string $table)
    {
        parent::__construct($table);
    }

    public function renderAll()
    {
        $category = $this->getAll();
        foreach ($category as $cat) {
            echo "
              <h2>Category title: {$cat['title']}</h2>
              <h3>Category id: {$cat['id']}</h3>
              ";
        }

    }

    public function renderByID(int $id)
    {
        $category = $this->getById($id);
        echo "
              <h2>Category title: {$category['title']}</h2>
              <h3>Category id: {$category['id']}</h3>
              ";
    }

}