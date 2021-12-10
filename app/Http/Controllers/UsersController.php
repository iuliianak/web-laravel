<?php

namespace App\Http\Controllers;

class UsersController
{
    public function create()
    {
        return 'Регистрация нового пользователя';
    }

    public function auth()
    {
        return 'Пользователь успешно авторизирован';
    }

    public function show($id)
    {
        return 'Информация о пользователе id = ' . $id;
    }

    public function delete($id)
    {
        return 'Пользователь id = ' . $id . ' удален';
    }
}
