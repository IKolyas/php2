<?php

namespace app\models;
class Order extends Model
{
    public function __construct(string $table)
    {
        parent::__construct($table);
    }

    public function renderAll()
    {
        $orders = $this->getAll();
        foreach ($orders as $ord) {
            echo "
              <h2>Order id: {$ord['id']}</h2>
              <h3>User id: {$ord['user_id']}</h3>
              ";
        }

    }

    public function renderByID(int $id)
    {
        $order = $this->getAll();
        echo "
              <h2>Order id: {$order['id']}</h2>
              <h3>User id: {$order['user_id']}</h3>
              <p>count:{$order['count']}</p>
              <p>sum: {$order['sum']}</p>
              <p>product: {$order['product_id']}</p>
               <p>date: {$order['date']}</p>
              ";
    }


}