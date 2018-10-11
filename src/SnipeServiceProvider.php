<?php

namespace Drfraker\Snipe;

use Illuminate\Support\ServiceProvider;
use Drfraker\Snipe\Console\DumpDatabase;
use Drfraker\Snipe\Console\CreateSqliteDb;

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
