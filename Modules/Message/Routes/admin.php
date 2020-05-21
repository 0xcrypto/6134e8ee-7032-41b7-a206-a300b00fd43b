<?php

Route::get('messages', [
    'as' => 'admin.messages.index',
    'uses' => 'MessageController@index',
    //'middleware' => 'can:admin.messages.index',
]);

Route::get('messages/create', [
    'as' => 'admin.messages.create',
    'uses' => 'MessageController@create',
    'middleware' => 'can:admin.messages.create',
]);

Route::post('messages', [
    'as' => 'admin.messages.store',
    'uses' => 'MessageController@store',
    'middleware' => 'can:admin.messages.create',
]);

Route::get('messages/{id}/edit', [
    'as' => 'admin.messages.edit',
    'uses' => 'MessageController@edit',
    'middleware' => 'can:admin.messages.edit',
]);

Route::put('messages/{id}', [
    'as' => 'admin.messages.update',
    'uses' => 'MessageController@update',
    'middleware' => 'can:admin.messages.edit',
]);

Route::delete('messages/{ids?}', [
    'as' => 'admin.messages.destroy',
    'uses' => 'MessageController@destroy',
    'middleware' => 'can:admin.messages.destroy',
]);
