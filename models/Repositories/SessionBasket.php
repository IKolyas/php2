<?php


namespace app\models\repositories;


class SessionBasket extends SessionRepository
{

    public function getSessionProduct(): array
    {
        return $this->user['basket'];
    }

    public function saveSessionProduct(int $id, int $quantity = null)
    {
        if (is_null($quantity)) {
            $this->addSessionProduct($id);
        } else {
            $this->updateSessionProduct($id, $quantity);
        }
    }

    public function addSessionProduct(int $id)
    {
        $product = (new ProductRepository())->getBy($id);
        if (in_array($id, $this->user['basket'])) {
            $this->user['basket'][$id]['quantity'] += 1;
        } else {
            $sessionProduct = [
                'id' => $product['id'],
                'name' => $product['product_name'],
                'price' => $product['product_price'],
                'quantity' => 1,

            ];
            $this->user['basket'][$id] = $sessionProduct;
        }

    }

    public function updateSessionProduct(int $id, int $quantity)
    {
        $this->user['basket'][$id]['quantity'] = $quantity;
    }

    public function removeSessionProduct(int $id)
    {
        unset($this->user['basket'][$id]);
    }
}