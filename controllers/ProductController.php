<?php


namespace app\controllers;

use app\base\Request;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    protected object $product;

    public function __construct()
    {
        $this->product = (new ProductRepository());
    }

    public function actionCatalog()
    {
        $model = $this->product->getAll();
        echo $this->render('productCatalog', ['model' => $model]);
    }

    public function actionCard()
    {
        $id = (new Request())->req('id');
        $model = $this->product->getBy($id);
        echo $this->render('productCard', ['model' => $model]);
    }

}