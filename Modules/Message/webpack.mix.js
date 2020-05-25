let mix = require('laravel-mix');

mix.js('Modules/Message/Resources/assets/admin/js/main.js', 'Modules/Message/Assets/admin/js/message.js')
    .sass('Modules/Message/Resources/assets/admin/sass/main.scss', 'Modules/Message/Assets/admin/css/message.css');
