<?php

Route::group(['middleware' => 'web', 'prefix' => 'insurance', 'namespace' => 'KekecMed\Insurance\Http\Controllers'], function()
{
	Route::get('/', 'InsuranceController@index');
});