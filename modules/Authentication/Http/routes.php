<?php

Route::group([
    'middleware' => 'web',
    'prefix'     => 'authentication',
    'namespace'  => 'KekecMed\Authentication\Http\Controllers'
], function () {
    Route::get('/', 'AuthenticationController@index');
});