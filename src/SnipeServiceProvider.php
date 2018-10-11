<?php

namespace Drfraker\Snipe;

use DustinFraker\SnipeMigrations\Console\CreateSqliteDb;
use DustinFraker\SnipeMigrations\Console\DumpDatabase;
use Illuminate\Support\ServiceProvider;

class SnipeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Registering package commands.
        $this->commands([
            DumpDatabase::class,
            CreateSqliteDb::class,
        ]);
    }
}
