<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'user', 'namespace' => 'KekecMed\User\Http\Controllers'],
    function () {
        Route::get('/', 'UserController@index');
    });