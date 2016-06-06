<?php

Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'KekecMed\Calendar\Http\Controllers'], function()
{
	Route::resource('calendar', 'CalendarController');
});