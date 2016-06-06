<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Default route
 */
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard.index');
    } else {
        return redirect('login');
    }
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::get('logs', ['as' => 'logViewer', 'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index']);
});