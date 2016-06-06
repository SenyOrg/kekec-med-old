<?php

Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'KekecMed\Task\Http\Controllers'], function()
{
	Route::resource('task', 'TaskController');
});