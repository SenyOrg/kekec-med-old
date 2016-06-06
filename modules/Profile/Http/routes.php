<?php

Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'KekecMed\Profile\Http\Controllers'], function()
{
	Route::resource('profile', 'ProfileController');
});