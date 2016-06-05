<?php

Route::group(['middleware' => 'web', 'prefix' => 'theme', 'namespace' => 'KekecMed\Theme\Http\Controllers'], function()
{
	Route::get('/', 'ThemeController@index');
});