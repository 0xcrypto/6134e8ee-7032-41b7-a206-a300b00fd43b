<?php

namespace FleetCart\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use FloatingPoint\Stylist\StylistServiceProvider;
use Nwidart\Modules\LaravelModulesServiceProvider;
use Jackiedo\DotenvEditor\DotenvEditorServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         /*
        \URL::forceRootUrl(\Config::get('app.url'));    
        // And this if you wanna handle https URL scheme
        // It's not usefull for http://www.example.com, it's just to make it more independant from the constant value
        if (\Str::contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
            //use \URL:forceSchema('https') if you use laravel < 5.4
        }
*/
       Schema::defaultStringLength(191);

        if (Request::secure()) {
            URL::forceScheme('https');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(StylistServiceProvider::class);
        $this->app->register(LaravelModulesServiceProvider::class);

        if (! config('app.installed')) {
            $this->app->register(DotenvEditorServiceProvider::class);
        }
    }
}
