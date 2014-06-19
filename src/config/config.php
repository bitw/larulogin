<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 17.06.14
 * Time: 23:37
 */

return array(

    'providers' =>  'vkontakte,odnoklassniki,mailru,facebook,twitter,'.
                    'google,yandex,livejournal,openid,lastfm,'.
                    'linkedin,liveid,soundcloud,steam,flickr,'.
                    'uid,youtube,webmoney,foursquare,tumblr,'.
                    'googleplus,dudu,vimeo,instagram',

    'redirect_url' => route('larulogin.ulogin'),

    'mode' => 'small', // small, panel, window

    'small' => [
        'providers' => 'vkontakte,',
        'hidden' => ''
    ],
    'display' => 'small',

    'providers' => [

    ]

);