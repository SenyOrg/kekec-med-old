<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => '', 'namespace' => 'KekecMed\Consultation\Http\Controllers'],
    function () {
        Route::resource('consultation', 'ConsultationController');
    });
