<?php

Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'KekecMed\Insurance\Http\Controllers'], function()
{
	Route::resource('insurance', 'InsuranceController');
});