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
         * Endpoint: /login
         */
        Route::get('/login', 'QueueSubscriberController@index');
        Route::get('/meta/{queueId}', 'QueueSubscriberController@getQueueMeta');
        Route::get('/outgoing/{queueItemId}', 'QueueSubscriberController@moveToOutgoing');
        Route::get('/ingoing/{queueItemId}', 'QueueSubscriberController@moveToIngoing');


        /**
         * QueueItem manipulation Routes
         */
        Route::get('/create/{eventId}', 'QueueOverviewController@createQueueItem');
        Route::get('/delete/{queueItemId}', 'QueueOverviewController@deleteQueueItem');
        Route::get('/move/{queueItemId}/{queueId}', 'QueueOverviewController@moveQueueItem');
    }
);