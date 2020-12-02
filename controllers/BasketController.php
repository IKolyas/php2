<?php


namespace app\controllers;



use app\base\Request;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;

class BasketController extends Controller
{
    protected object $basket;
    protected object $product;
    protected object $request;

    public function __construct()
    {
        $this->basket = (new BasketRepository());
        $this->product = (new ProductRepository());
        $this->request =(new Request());
    }

    public function actionGet()
    {
        $model = $this->basket->getAll();
        echo $this->render('productBasket', ['model' => $model]);
    }

    public function actionAdd()
    {
        $params = $this->request->req('params');

        $basketProduct = $this->basket->getBy($params['id'], 'product_id');
        if (is_null($basketProduct)) {
            $getProduct = $this->product->getBy($params['id']);
            $params = [
                'product_id' => $getProduct->id,
                'product_name' => $getProduct->product_name,
                'product_price' => $getProduct->product_price,
                'product_quantity' => $params['quantity'],
            ];

            $this->basket->add($params);
        } else {
            $params = [
                'id' => $basketProduct->id,
                'product_quantity' => $basketProduct->product_quantity + 1,
            ];
            $this->basket->update($params);
        }

        $this->actionGet();
    }

    public function actionDelete()
    {
        $product = $this->request->req('id');
        $this->basket->delete($product);
        $this->actionGet();
    }

    public function actionUpdate()
    {
        $params = $this->request->req('params');
        $this->basket->update($params);
        $this->actionGet();
    }
}