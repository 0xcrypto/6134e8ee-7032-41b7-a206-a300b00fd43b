<?php

Route::get('message', [
    'as' => 'message.inbox.index',
    'uses' => 'InboxController@index',
    //'middleware' => 'can:admin.reports.index',
]);
