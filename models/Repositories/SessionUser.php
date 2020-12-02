<?php


namespace app\models\repositories;


use app\base\Request;
use app\controllers\ProductController;
use app\controllers\UserController;

class SessionUser extends SessionRepository
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function segInUser(): bool
    {
        $authRequest = (new Request())->req('auth');
        $userLogin = $authRequest['login'];
        $userPassword = $authRequest['password'];
        $user = $this->session();
        $userDB = (new UserRepository())->getBy($userLogin, 'login');
        if (isset($userDB) && $userDB->password == $userPassword) {
            $user['id'] = $userDB->id;
            $user['username'] = $userDB->login;

            return true;
        } else {
            return false;
        }
    }

    public function segOutUser()
    {
        $user =$this->session();
        unset($user);
        session_destroy();
        return true;
    }
}