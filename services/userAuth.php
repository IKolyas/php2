<?php

use app\models\User;

function userAuth(array $request)
{
    $userLogin = $request['login'];
    $user = User::getBy($userLogin, 'login');

    if (isset($user) && $request['password'] === $user->password) {
        return $user;
    } else {
        return false;
    }
}