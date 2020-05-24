<?php

Route::get('messages/show/{currentTab}/{id}/{total_inbox}', [
    'as' => 'admin.messages.show',
    'uses' => 'MessageController@show',
    //'middleware' => 'can:admin.messages.index',
]);

Route::get('messages/{currentTab}/{searchString?}', [
    'as' => 'admin.messages.index',
    'uses' => 'MessageController@index',
    //'middleware' => 'can:admin.messages.index',
]);

Route::post('messages/send', [
    'as' => 'admin.messages.send',
    'uses' => 'MessageController@send',
    //'middleware' => 'can:admin.messages.create',
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
