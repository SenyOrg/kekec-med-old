<?php

/**
 * Queue related routes
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */

/**
 * GROUP: /queue
 */
Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'queue', 'namespace' => 'KekecMed\Queue\Http\Controllers'],
    function () {

        /**
         * Endpoint: /overview
         */
        Route::get('/overview', 'QueueOverviewController@index');
    });