<?php

Route::group(['middleware' => 'web', 'prefix' => 'patient', 'namespace' => 'KekecMed\Patient\Http\Controllers'], function()
{
	Route::get('/', 'PatientController@index');
});