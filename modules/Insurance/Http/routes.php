<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => '', 'namespace' => 'KekecMed\Insurance\Http\Controllers'], function()
{
	Route::resource('insurance', 'InsuranceController');
});