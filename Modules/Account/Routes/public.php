<?php

Route::middleware('auth')->group(function () {
    Route::get('account', 'AccountDashboardController@index')->name('account.dashboard.index');

    Route::get('account/profile', 'AccountProfileController@edit')->name('account.profile.edit');
    Route::put('account/profile', 'AccountProfileController@update')->name('account.profile.update');

    Route::get('account/orders', 'AccountOrderController@index')->name('account.orders.index');
    Route::get('account/orders/{id}', 'AccountOrderController@show')->name('account.orders.show');

    Route::get('account/tickets', 'AccountTicketController@index')->name('account.tickets.index');
    Route::get('account/tickets/create', 'AccountTicketController@create')->name('account.tickets.create');
    Route::post('account/tickets/store', 'AccountTicketController@store')->name('account.tickets.store');
    Route::get('account/tickets/{id}', 'AccountTicketController@show')->name('account.tickets.show');

    Route::get('account/wishlist', 'AccountWishlistController@index')->name('account.wishlist.index');
    Route::delete('account/wishlist/{productId}', 'AccountWishlistController@destroy')->name('account.wishlist.destroy');

    Route::get('account/reviews', 'AccountReviewController@index')->name('account.reviews.index');
});
