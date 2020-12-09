<?php


namespace app\controllers;


use app\base\Application;

class BasketController extends Controller
{

    public function actionGet()
    {
        $model = Application::getInstance()->basket->getAll();
        echo $this->render('productBasket', ['model' => $model]);
    }

    public function actionAdd()
    {
        $prodParams = Application::getInstance()->request->req('params');
        $basketProduct = Application::getInstance()->basket->getBy($prodParams['id'], 'product_id');
        if (is_null($basketProduct)) {
            $getProduct = Application::getInstance()->product->getBy($prodParams['id']);
            $params = [
                'product_id' => $getProduct->id,
                'product_name' => $getProduct->product_name,
                'product_price' => $getProduct->product_price,
                'product_quantity' => $prodParams['quantity'],
            ];

            Application::getInstance()->basket->add($params);
        } else {
            $params = [
                'id' => $basketProduct->id,
                'product_quantity' => $basketProduct->product_quantity + 1,
            ];
            Application::getInstance()->basket->update($params);
        }

        $this->actionGet();
    }

    public function actionDelete()
    {
        $product = Application::getInstance()->request->req('id');
        Application::getInstance()->basket->delete($product);
        $this->actionGet();
    }

    public function actionUpdate()
    {
        $params = Application::getInstance()->request->req('params');
        Application::getInstance()->basket->update($params);
        $this->actionGet();
    }
}