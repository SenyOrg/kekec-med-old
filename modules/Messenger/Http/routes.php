<?php

Route::group(['middleware' => ['web', 'auth'] , 'prefix' => 'messenger', 'namespace' => 'KekecMed\Messenger\Http\Controllers'], function()
{
	Route::get('chats', 'MessengerController@chats');
    Route::get('/chat/{id}/message', 'MessengerController@sendMessage');
	Route::get('/chat/{id}/read', 'MessengerController@markAsRead');
	Route::get('/chat/{id}', 'MessengerController@chat');
});