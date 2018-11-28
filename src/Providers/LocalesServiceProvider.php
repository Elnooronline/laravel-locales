<?php

namespace Elnooronline\LaravelLocales\Providers;

use Illuminate\Support\ServiceProvider;
use Elnooronline\LaravelLocales\LocalesBuilder;

class LocalesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/locales.php', 'locales');

        $this->publishes([
            __DIR__.'/../../config/locales.php' => config_path('locales.php'),
        ], 'locales:config');

        $this->publishes([
            __DIR__.'/../../flags' => public_path('images/flags'),
        ], 'locales:flags');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('elnooronline.locales', function ($app) {
            return new LocalesBuilder($app);
        });
    }
}