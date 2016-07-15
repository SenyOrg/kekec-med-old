<?php

Route::group(['middleware' => 'web', 'prefix' => 'queue', 'namespace' => 'KekecMed\Queue\Http\Controllers'],
    function () {
        Route::get('/', 'QueueController@index');
    });