<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => '', 'namespace' => 'KekecMed\Dashboard\Http\Controllers'],
    function () {
        Route::resource('dashboard', 'DashboardController');
    });