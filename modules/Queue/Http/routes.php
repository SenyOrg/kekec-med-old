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
            Route::get('/waitingroom', 'QueueWaitingRoomController@index');

            /**
             * Endpoint: /overview
             */
        Route::get('/overview', 'QueueOverviewController@index');

            /**
             * QueueItem manipulation Routes
             */
            Route::get('/create/{eventId}', 'QueueOverviewController@createQueueItem');
            Route::get('/delete/{queueItemId}', 'QueueOverviewController@deleteQueueItem');
            Route::get('/move/{queueItemId}/{queueId}', 'QueueOverviewController@moveQueueItem');
    }
);