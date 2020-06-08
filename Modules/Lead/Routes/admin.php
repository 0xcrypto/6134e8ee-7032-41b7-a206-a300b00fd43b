<?php

Route::get('leads', [
    'as' => 'admin.leads.index',
    'uses' => 'LeadController@index',
    //'middleware' => 'can:admin.leads.index',
]);

Route::get('leads/create', [
    'as' => 'admin.leads.create',
    'uses' => 'LeadController@create',
    //'middleware' => 'can:admin.leads.create',
]);

Route::post('leads', [
    'as' => 'admin.leads.store',
    'uses' => 'LeadController@store',
    //'middleware' => 'can:admin.leads.create',
]);

Route::get('leads/{id}/edit', [
    'as' => 'admin.leads.edit',
    'uses' => 'LeadController@edit',
    //'middleware' => 'can:admin.leads.edit',
]);

Route::put('leads/{id}', [
    'as' => 'admin.leads.update',
    'uses' => 'LeadController@update',
    //'middleware' => 'can:admin.leads.edit',
]);

Route::delete('leads/{ids?}', [
    'as' => 'admin.leads.destroy',
    'uses' => 'LeadController@destroy',
    //'middleware' => 'can:admin.leads.destroy',
]);

