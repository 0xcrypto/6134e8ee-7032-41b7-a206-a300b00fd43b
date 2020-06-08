<?php

Route::get('tickets', [
    'as' => 'admin.tickets.index',
    'uses' => 'TicketController@index',
    'middleware' => 'can:admin.tickets.index',
]);

Route::get('tickets/create', [
    'as' => 'admin.tickets.create',
    'uses' => 'TicketController@create',
    'middleware' => 'can:admin.tickets.create',
]);

Route::post('tickets', [
    'as' => 'admin.tickets.store',
    'uses' => 'TicketController@store',
    'middleware' => 'can:admin.tickets.create',
]);

Route::get('tickets/{id}/edit', [
    'as' => 'admin.tickets.edit',
    'uses' => 'TicketController@edit',
    'middleware' => 'can:admin.tickets.edit',
]);

Route::put('tickets/{id}', [
    'as' => 'admin.tickets.update',
    'uses' => 'TicketController@update',
    'middleware' => 'can:admin.tickets.edit',
]);

Route::delete('tickets/{ids?}', [
    'as' => 'admin.tickets.destroy',
    'uses' => 'TicketController@destroy',
    'middleware' => 'can:admin.tickets.destroy',
]);

// append

