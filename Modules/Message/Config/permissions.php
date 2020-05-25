<?php

return [
    'admin.inboxes' => [
        'index' => 'message::permissions.index',
        'create' => 'message::permissions.create',
        'edit' => 'message::permissions.edit',
        'destroy' => 'message::permissions.destroy',
    ],

    'admin.messages' => [
        'index' => 'message::permissions.index',
        'create' => 'message::permissions.create',
        'edit' => 'message::permissions.edit',
        'destroy' => 'message::permissions.destroy',
    ],

    'admin.message_recipients' => [
        'index' => 'message::permissions.index',
        'create' => 'message::permissions.create',
        'edit' => 'message::permissions.edit',
        'destroy' => 'message::permissions.destroy',
    ],

// append



];
