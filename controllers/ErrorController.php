<?php


namespace app\controllers;


class ErrorController extends Controller
{
    public function actionNotFound()
    {
        echo $this->render('notFound');
    }
}