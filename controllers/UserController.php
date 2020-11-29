<?php


namespace app\controllers;

require_once '../vendor/autoload.php';


use app\controllers\ProductController;
use app\models\User;

class UserController extends Controller
{
    public function actionLogin()
    {
        echo $this->render('loginForm');
    }

    public function actionAccount()
    {
        echo $this->render('userAccount', ['user' => $_SESSION['user']]);
    }

    public function actionAuthentication()
    {
        $request = post('auth');
        if ($user = userAuth($request)) {
            if (!isset($_SESSION['user'])) {
                $_SESSION['user'] = [
                    'id' => $user->id,
                    'username' => $user->login,
                ];
            }
            $this->actionAccount();
        };

    }

    public function actionOut()
    {
        unset($_SESSION['user']);
        session_destroy();
        (new ProductController)->actionCatalog();
    }
}