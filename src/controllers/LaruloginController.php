<?php

class LaruloginController extends \BaseController
{

    public function getUlogin()
    {
        //return __METHOD__;
        return var_export(Config::get('larulogin::redirect'), 1);
    }

    public function postUlogin()
    {
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);
        //$user['network'] - соц. сеть, через которую авторизовался пользователь
        //$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
        //$user['first_name'] - имя пользователя
        //$user['last_name'] - фамилия пользователя

        $ulogin = new Ulogin();

        $ulogin->create(Input::all());
    }

}