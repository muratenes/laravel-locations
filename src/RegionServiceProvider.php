<?php

namespace MuratEnes\Regions;

use Illuminate\Support\ServiceProvider;

class RegionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // controllers
        $this->app->make('MuratEnes\Regions\RegionController');
        // views
        $this->loadViewsFrom(__DIR__ . '/views', 'regions');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        // seeds
        if ($this->app->runningInConsole()){
            $this->publishes([
                __DIR__ . '/../database/seeds/CountrySeeder.php' => database_path('seeders/CountrySeeder.php'),
            ], 'regions-seeds');
        }
    }
}
