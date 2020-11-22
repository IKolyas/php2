<?php


namespace app\controllers;


use app\models\Basket;
use app\models\Product;

class BasketController extends Controller
{
    public function actionGet()
    {
        $model = Basket::getAll();
        echo $this->render('productBasket', ['model' => $model]);
    }

    public function actionAdd()
    {
        $params = post('params');
        $basketProduct = Basket::getById($params['id'], 'product_id');
        if (is_null($basketProduct)) {
            $getProduct = Product::getById($params['id']);
            $params = [
                'product_id' => $getProduct->id,
                'product_name' => $getProduct->product_name,
                'product_price' => $getProduct->product_price,
                'product_quantity' => $params['quantity'],
            ];

            Basket::add($params);
        } else {
            $params = [
                'id' => $basketProduct->id,
                'product_quantity' => $basketProduct->product_quantity + 1,
            ];
            Basket::update($params);
        }

        static::actionGet();
    }

    public function actionDelete()
    {
        $productId = post('id');
        Basket::delete($productId);
        static::actionGet();
    }

    public function actionUpdate()
    {
        $params = post('params');
        Basket::update($params);
        static::actionGet();
    }
}