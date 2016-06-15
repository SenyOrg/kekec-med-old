<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => '', 'namespace' => 'KekecMed\Profile\Http\Controllers'], function()
{
	Route::resource('profile', 'ProfileController');
});