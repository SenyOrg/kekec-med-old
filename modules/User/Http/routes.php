<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'KekecMed\User\Http\Controllers'], function()
{
	Route::get('/', 'UserController@index');
});