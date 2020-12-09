<?php


namespace app\controllers;

require_once '../vendor/autoload.php';


use app\base\Application;
use app\services\Path;

class UserController extends Controller
{

    public function actionLogin()
    {
        echo $this->render('loginForm');
    }

    public function actionAccount()
    {
        $user = Application::getInstance()->session->get('user');
        $productsList = Application::getInstance()->product->getAll();
        echo $this->render('userAccount', [
                'user' => $user,
                'products' => $productsList
            ]
        );
    }

    public function actionAuthentication()
    {
        $req = Application::getInstance()->request->req('auth');
        $userLogin = $req['login'];
        $userPassword = $req['password'];
        $userDB = Application::getInstance()->users->getBy($userLogin, 'login');
        if (isset($userDB) && $userDB->password == $userPassword) {
            $sessionUser = [
                'id' => $userDB->id,
                'login' => $userDB->login,
            ];
            Application::getInstance()->session->set('user', $sessionUser);
            (new Path())->redirect('/user/account');
        } else {
            echo 'Error login or password';
        }

    }

    public function actionOut()
    {
        Application::getInstance()->session->delete('user');
        (new Path())->redirect('/product/catalog');
    }
}