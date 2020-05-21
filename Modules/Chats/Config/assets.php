<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define which assets will be available through the asset manager
    |--------------------------------------------------------------------------
    | These assets are registered on the asset manager
    */
    'all-assets' => [
        'admin.chats.css' => ['module' => 'chats:admin/css/chats.css'],
        'admin.chats.js' => ['module' => 'chats:admin/js/chats.js'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Define which default assets will always be included in your pages
    | through the asset pipeline
    |--------------------------------------------------------------------------
    */
    'required-assets' => [],
];
