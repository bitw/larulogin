<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 17.06.14
 * Time: 23:37
 */

return array(

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