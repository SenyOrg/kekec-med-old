<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'KekecMed\Notice\Http\Controllers'], function () {
    Route::resource('notice', 'NoticeController');
});