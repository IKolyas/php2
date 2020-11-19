<?php


namespace app\models;


class Users extends Model
{
    public function __construct(string $table)
    {
        parent::__construct($table);
    }

    public function renderAll()
    {
        $users = $this->getAll();
        foreach ($users as $user) {
            echo "
              <h2>User name: {$user['login']}</h2>
              <h3>User id: {$user['user_id']}</h3>
              ";
        }

    }

    public function renderByID(int $id)
    {
        $user = $this->getById($id);
        echo "
              <h2>User name: {$user['login']}</h2>
              <h3>User id: {$user['user_id']}</h3>
              ";
    }

}