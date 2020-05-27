<?php

Route::get('storeunits', [
    'as' => 'admin.storeunits.index',
    'uses' => 'storeunitController@index',
    //'middleware' => 'can:admin.storeunits.index',
]);

Route::get('storeunits/create', [
    'as' => 'admin.storeunits.create',
    'uses' => 'storeunitController@create',
    //'middleware' => 'can:admin.storeunits.create',
]);

Route::post('storeunits', [
    'as' => 'admin.storeunits.store',
    'uses' => 'storeunitController@store',
    //'middleware' => 'can:admin.storeunits.create',
]);

Route::get('storeunits/{id}/edit', [
    'as' => 'admin.storeunits.edit',
    'uses' => 'storeunitController@edit',
    //'middleware' => 'can:admin.storeunits.edit',
]);

Route::put('storeunits/{id}', [
    'as' => 'admin.storeunits.update',
    'uses' => 'storeunitController@update',
    //'middleware' => 'can:admin.storeunits.edit',
]);

Route::delete('storeunits/{ids?}', [
    'as' => 'admin.storeunits.destroy',
    'uses' => 'storeunitController@destroy',
    //'middleware' => 'can:admin.storeunits.destroy',
]);

// append

