<?php

Route::post('cookie-bar', 'CookieBarController@accepted')->name('cookie_bar.accepted');
Route::get('products/{slug}/quick-view', 'ProductQuickViewController@show')->name('products.quick_view.show');
