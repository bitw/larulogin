<?php

Route::group(['before'=>'guest'], function(){

    Route::get('/ulogin', ['as'=>'larulogin.ulogin', 'uses'=>'LaruloginController@getUlogin']);

    Route::post(Config::get('larulogin::redirect'), ['as'=>'larulogin.ulogin', 'uses'=>'LaruloginController@postUlogin']);

});