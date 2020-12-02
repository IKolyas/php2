<?php

use app\models\repositories\UserRepository;

function userAuth(array $request)
{
    $userLogin = $request['login'];
    $user = (new UserRepository())->getBy($userLogin, 'login');

    if (isset($user) && $request['password'] === $user->password) {
        return $user;
    } else {
        return false;
    }
}