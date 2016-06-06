<?php

Route::group(['middleware' => 'web', 'prefix' => 'dashboard', 'namespace' => 'KekecMed\Dashboard\Http\Controllers'], function()
{
	Route::get('/', 'DashboardController@index');
});