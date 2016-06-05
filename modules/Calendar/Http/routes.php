<?php

Route::group(['middleware' => 'web', 'prefix' => 'calendar', 'namespace' => 'KekecMed\Calendar\Http\Controllers'], function()
{
	Route::get('/', 'CalendarController@index');
});