<?php


namespace app\controllers;

require_once '../vendor/autoload.php';


use app\base\Request;
use app\controllers\ProductController;
use app\models\repositories\SessionUser;
use app\models\User;

class UserController extends Controller
{


    public function actionLogin()
    {
        echo $this->render('loginForm');
    }

    public function actionAccount()
    {
        $user = (new SessionUser)->session();
        var_dump($user);
        echo $this->render('userAccount', ['user' => $user]);
    }

    public function actionAuthentication()
    {
        $auth = (new SessionUser())->segInUser();
        var_dump($auth);
        if ($auth) {
            var_dump($auth);
            $this->actionAccount();
        }
//        $request = (new Request())->req('auth');
//        if ($user = userAuth($request)) {
//            if (!isset($_SESSION['user'])) {
//                $_SESSION['user'] = [
//                    'id' => $user->id,
//                    'username' => $user->login,
//                ];
//            }
//            $this->actionAccount();
//        };

    }

    public function actionOut()
    {
        $userOut = (new SessionUser())->segInUser();
        if ($userOut) {
            (new ProductController())->actionCatalog();
        }
    }
}