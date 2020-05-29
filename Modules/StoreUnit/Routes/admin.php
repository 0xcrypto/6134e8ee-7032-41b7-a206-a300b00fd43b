<?php

Route::get('store-units', [
    'as' => 'admin.store_units.index',
    'uses' => 'StoreUnitController@index',
    //'middleware' => 'can:admin.store_units.index',
]);

Route::get('store-units/create', [
    'as' => 'admin.store_units.create',
    'uses' => 'StoreUnitController@create',
    //'middleware' => 'can:admin.store_units.create',
]);

Route::post('store-units', [
    'as' => 'admin.store_units.store',
    'uses' => 'StoreUnitController@store',
    //'middleware' => 'can:admin.store_units.create',
]);

Route::get('store-units/{id}/edit', [
    'as' => 'admin.store_units.edit',
    'uses' => 'StoreUnitController@edit',
    //'middleware' => 'can:admin.store_units.edit',
]);

Route::put('store-units/{id}', [
    'as' => 'admin.store_units.update',
    'uses' => 'StoreUnitController@update',
    //'middleware' => 'can:admin.store_units.edit',
]);

Route::delete('store-units/{ids?}', [
    'as' => 'admin.store_units.destroy',
    'uses' => 'StoreUnitController@destroy',
    //'middleware' => 'can:admin.store_units.destroy',
]);

// append


