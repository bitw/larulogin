<?php

class LaruloginController extends \BaseController
{

    public function getUlogin()
    {
        return var_export(Config::get('larulogin::redirect'), 1);
    }

    public function postUlogin()
    {
        $_user = json_decode(
            file_get_contents('http://ulogin.ru/token.php?token=' . Input::get('token') . '&host=' . $_SERVER['HTTP_HOST']),
            true
        );

        //$user['network'] - соц. сеть, через которую авторизовался пользователь
        //$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
        //$user['first_name'] - имя пользователя
        //$user['last_name'] - фамилия пользователя

        $validate = Validator::make([], []);

        if(isset($_user['error']))
        {
            $validate->errors()->add('error', trans('larulogin::larulogin.'.$_user['error']));

            return Response::make(
                View::make(Config::get('larulogin::views.error'), ['errors' => $validate->errors()]),
                401
            );
        }

        // Check exist user
        $check = Ulogin::where('identity', '=', $_user['identity'])->first();

        if($check)
        {
            Auth::loginUsingId($check->user_id, true);

            $authSentry = Sentry::findUserById($check->user_id);
            Sentry::login($authSentry, true);

            return Redirect::to('/');
        }

        $rules = array(
            'network'   => 'required|max:255',
            'identity'  => 'required|max:255|unique:ulogin',
            'email'     => 'required|unique:ulogin|unique:users',
        );

        $messages = array(
            'email.unique' => trans('larulogin::larulogin.email_already_registered'),
        );

        $validate = Validator::make($_user, $rules, $messages);

        if($validate->passes())
        {
            $password = str_random(8);

            $user = Sentry::createUser(array(
                'first_name'    => $_user['first_name'],
                'last_name'     => $_user['last_name'],
                'email'         => $_user['email'],
                'password'      => $password,
                'activated'     => TRUE,
            ));

            foreach(Config::get('larulogin::add_to_groups') as $group_name) $user->addGroup(Sentry::findGroupByName($group_name));

            $ulogin = new Ulogin();

            $ulogin->user_id        = $user->id;
            $ulogin->network        = $_user['network'];
            $ulogin->identity       = $_user['identity'];
            $ulogin->email          = $_user['email'];
            $ulogin->first_name     = $_user['first_name'];
            $ulogin->last_name      = $_user['last_name'];
            $ulogin->photo          = $_user['photo'];
            $ulogin->photo_big      = $_user['photo_big'];
            $ulogin->profile        = $_user['profile'];
            $ulogin->access_token   = isset($_user['access_token']) ? $_user['access_token'] : '';
            $ulogin->country        = isset($_user['country']) ? $_user['country'] : '';
            $ulogin->city           = isset($_user['city']) ? $_user['city'] : '';


            $ulogin->save();

            $authClassic = Auth::loginUsingId($user->id);

            $authSentry = Sentry::authenticate(array(
                'email'     => $_user['email'],
                'password'  => $password
            ), true);

            return Redirect::to('/');

        }
        else
        {
            return Response::make(
                View::make(Config::get('larulogin::views.error'), array(
                    'errors' => $validate->errors(),
                )),
                401
            );

        }
    }

}