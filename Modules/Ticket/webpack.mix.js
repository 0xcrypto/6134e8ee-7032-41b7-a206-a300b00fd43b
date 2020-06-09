let mix = require('laravel-mix');

mix.js('Modules/Ticket/Resources/assets/admin/js/main.js', 'Modules/Ticket/Assets/admin/js/ticket.js')
    .sass('Modules/Ticket/Resources/assets/admin/sass/main.scss', 'Modules/Ticket/Assets/admin/css/ticket.css');
