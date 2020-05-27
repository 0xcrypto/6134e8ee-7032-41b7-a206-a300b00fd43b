<?php

Route::get('messages/show/{currentTab}/{id}', [
    'as' => 'admin.messages.show',
    'uses' => 'MessageController@show',
    'middleware' => 'can:admin.messages.index',
]);

Route::get('messages/{currentTab}/{searchString?}', [
    'as' => 'admin.messages.index',
    'uses' => 'MessageController@index',
    'middleware' => 'can:admin.messages.index',
]);

Route::post('messages/send', [
    'as' => 'admin.messages.send',
    'uses' => 'MessageController@send',
    'middleware' => 'can:admin.messages.create',
]);

Route::post('messages/inboxDelete', [
    'as' => 'admin.messages.inbox.delete',
    'uses' => 'MessageController@inboxDelete',
    'middleware' => 'can:admin.messages.destroy',
]);

Route::post('messages/outboxDelete', [
    'as' => 'admin.messages.outbox.delete',
    'uses' => 'MessageController@outboxDelete',
    'middleware' => 'can:admin.messages.destroy',
]);

