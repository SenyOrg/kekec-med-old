<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'theme', 'namespace' => 'KekecMed\Theme\Http\Controllers'],
    function () {

    });