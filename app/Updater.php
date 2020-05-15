<?php

namespace FleetCart;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class Updater
{
    public static function run()
    {
        @set_time_limit(0);

        self::migrate();
        self::clearViewCache();
        self::clearConfigCache();
        self::clearRouteCache();
        self::clearAppCache();

        File::delete(storage_path('app/update'));
    }

    private static function migrate()
    {
        if (config('app.installed')) {
            Artisan::call('migrate', ['--force' => true]);
        }
    }

    private static function clearViewCache()
    {
        Artisan::call('view:clear');
    }

    private static function clearConfigCache()
    {
        Artisan::call('config:clear');
    }

    private static function clearRouteCache()
    {
        Artisan::call('route:trans:clear');
    }

    private static function clearAppCache()
    {
        Artisan::call('cache:clear');
    }
}
