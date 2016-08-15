<?php

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'KekecMed\Media\Http\Controllers'], function () {
    /**
     * Resource: MediaController
     */
    Route::resource('media', 'MediaController');

    /**
     * Download
     */
    Route::get('media/download/{id}', 'MediaController@download')->name('media.download');

    /**
     * Delete
     */
    Route::get('media/delete/{id}', 'MediaController@delete')->name('media.delete');
});