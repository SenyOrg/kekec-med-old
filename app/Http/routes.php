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
        return redirect()->route('root');
    } else {
        return redirect('login');
    }
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('root');
    Route::get('logs', ['as' => 'logViewer', 'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index']);
    Route::resource('profile', 'ProfileController');
    Route::resource('patient', 'PatientController');
    Route::resource('insurance', 'NotImplementedController');
    Route::resource('consultation', 'NotImplementedController');
    Route::resource('task', 'NotImplementedController');


    /**Route::group(['prefix' => 'user'], function () {
        Route::get('profile', 'UserController@showProfile')->name('user.profile');
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });**/
});