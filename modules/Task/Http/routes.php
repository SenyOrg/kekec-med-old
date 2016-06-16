<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => '', 'namespace' => 'KekecMed\Task\Http\Controllers'],
    function () {
        Route::resource('task', 'TaskController');
    });