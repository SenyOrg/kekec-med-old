<?php

Route::group(['middleware' => 'web', 'prefix' => 'consultation', 'namespace' => 'KekecMed\Consultation\Http\Controllers'], function()
{
	Route::get('/', 'ConsultationController@index');
});