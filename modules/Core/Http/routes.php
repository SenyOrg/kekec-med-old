<?php

Route::group(['middleware' => 'web', 'prefix' => 'core', 'namespace' => 'KekecMed\Core\Http\Controllers'], function()
{
	Route::get('/', 'CoreController@index');
});