<?php

Route::group(['middleware' => 'web', 'prefix' => 'admincenter', 'namespace' => 'KekecMed\AdminCenter\Http\Controllers'], function()
{
	Route::get('/', 'AdminCenterController@index');
});