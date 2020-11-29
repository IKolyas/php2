<?php


namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{


    public function actionCatalog()
    {
        $model = Product::getAll();
        echo $this->render('productCatalog', ['model' => $model]);
    }

    public function actionCard()
    {
        $id = get('id');
        $model = Product::getBy($id);
        echo $this->render('productCard', ['model' => $model]);
    }

}