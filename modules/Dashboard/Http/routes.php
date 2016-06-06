<?php

Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'KekecMed\Dashboard\Http\Controllers'], function()
{
	Route::resource('dashboard', 'DashboardController');
});