<?php

Route::group(['middleware' => 'web', 'prefix' => 'task', 'namespace' => 'KekecMed\Task\Http\Controllers'], function()
{
	Route::get('/', 'TaskController@index');
});