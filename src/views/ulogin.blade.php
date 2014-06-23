<?php
    $params = [
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
        //'_token' => csrf_token()
    ];

    $data_ulogin = str_replace('%2C', ',', http_build_query($params, '', ';'));
?>
<script src="//ulogin.ru/js/ulogin.js"></script>
<div id="uLogin" data-ulogin="{{$data_ulogin}}"></div>