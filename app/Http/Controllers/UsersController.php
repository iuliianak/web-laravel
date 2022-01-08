<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController
{
    public function create()
    {
        /*
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@mail.ru';
        $user->password = md5('password');
        $user->save();
        */
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
