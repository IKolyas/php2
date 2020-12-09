<?php


namespace app\controllers;

use app\base\Application;
use app\services\Path;

class ProductController extends Controller
{
    public function actionCatalog()
    {
        $model = Application::getInstance()->product->getAll();
        echo $this->render('productCatalog', ['model' => $model]);
    }

    public function actionCard()
    {
        $id = Application::getInstance()->request->req('id');
        $model = Application::getInstance()->product->getBy($id);
        echo $this->render('productCard', ['model' => $model]);
    }

    public function actionAdd()
    {
        $product = Application::getInstance()->request->req('product');
        Application::getInstance()->product->add($product);
        (new Path())->redirect('/user/account');
    }

    public function actionDelete()
    {
        $product = Application::getInstance()->request->req('product_id');
        Application::getInstance()->product->delete($product);
        (new Path())->redirect('/user/account');
    }
}