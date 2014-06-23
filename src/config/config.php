<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 17.06.14
 * Time: 23:37
 */

return array(

    'mode' => 'small', // small | panel | window

    'modes'    => [
        'small' => [
            'display'   => 'small',
            'fields'    => implode(',', [
                'email',
                'first_name',
                'last_name',
                'nickname',
                'photo',
                'photo_big',
                'bdate',
                'sex',
                'country',
                'city'
            ]),
            'providers' => implode(',', [
                'vkontakte',
                'odnoklassniki',
                'mailru',
                'facebook'
            ]),
            'hidden' => implode(',', [
                'other'
            ]),
            'redirect_uri' => route('larulogin.ulogin'),
        ],
        'panel' => [
            'display'   => 'panel',
            'fields'    => implode(',', [
                'email',
                'first_name',
                'last_name',
                'nickname',
                'photo',
                'photo_big',
                'bdate',
                'sex',
                'country',
                'city'
            ]),
            'providers' => implode(',', [
                'vkontakte',
                'odnoklassniki',
                'mailru',
                'facebook'
            ]),
            'hidden' => implode(',', [
                'other'
            ]),
            'redirect_uri' => route('larulogin.ulogin'),
        ],
        'window'=> [
            'display'   => 'window',
            'fields'    => implode(',', [
                'email',
                'first_name',
                'last_name',
                'nickname',
                'photo',
                'photo_big',
                'bdate',
                'sex',
                'country',
                'city'
            ]),
            'element'   => '<img src="https://ulogin.ru/img/button.png" width=187 height=30 alt="МультиВход"/>'
        ],
    ],

    'template'  => 'default',

    'out'       => 'content',

    'redirect'  => '/ulogin',

    'views'     => [
        'ulogin'    => 'larulogin::ulogin',
        'error'     => 'larulogin::error',
    ],

    'add_to_groups' => [

    ],

);