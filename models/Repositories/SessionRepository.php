<?php


namespace app\models\repositories;


abstract class SessionRepository
{

    public function __construct()
    {
        $this->sessionUser();
    }

    private function sessionUser()
    {
        if (!isset($_SESSION['user'])) {
            $session = [
                'user_id' => null,
                'username' => '',
                'basket' => [],
            ];
            $_SESSION['user'] = $session;
        }

    }

    public function session()
    {
        return $_SESSION['user'];
    }
}