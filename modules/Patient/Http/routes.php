<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'KekecMed\Patient\Http\Controllers'], function () {
    Route::resource('patient', 'PatientController');
});