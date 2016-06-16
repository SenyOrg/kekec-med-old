<?php

Route::group(['middleware' => 'web', 'prefix' => '', 'namespace' => 'KekecMed\Consultation\Http\Controllers'],
    function () {
        Route::resource('consultation', 'ConsultationController');
    });