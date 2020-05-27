<?php


Route::get('stores', [
    'as' => 'admin.stores.index',
    'uses' => 'StoreController@index',
    //'middleware' => 'can:admin.stores.index',
]);


Route::get('stores/create', [
    'as' => 'admin.stores.create',
    'uses' => 'StoreController@create',
    //'middleware' => 'can:admin.stores.create',
]);


Route::post('stores', [
    'as' => 'admin.stores.store',
    'uses' => 'StoreController@store',
    //'middleware' => 'can:admin.stores.create',
]);

Route::get('stores/{id}/edit', [
    'as' => 'admin.stores.edit',
    'uses' => 'StoreController@edit',
    //'middleware' => 'can:admin.stores.edit',
]);

Route::put('stores/{id}', [
    'as' => 'admin.stores.update',
    'uses' => 'StoreController@update',
    //'middleware' => 'can:admin.stores.edit',
]);

Route::delete('stores/{ids?}', [
    'as' => 'admin.stores.destroy',
    'uses' => 'StoreController@destroy',
    //'middleware' => 'can:admin.stores.destroy',
]);