<?php

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'core', 'namespace' => 'KekecMed\Core\Http\Controllers'], function()
{
    /**
     * Session API
     */
	Route::get('/session/{key}/{value?}', function($key, $value) {
        if (isset($value)) {
            Session::set($key, $value);
        } else {
            Session::get($key);
        }
    });

    /**
     * Password check
     */
    Route::get('/check/{password?}', function($password) {
        return response()->json([
            'result' => ((is_null($password)) ? false : Hash::check($password, \Auth::user()->password))]);
    });
});