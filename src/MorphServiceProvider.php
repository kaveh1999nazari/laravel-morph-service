<?php

namespace Kaveh\LaravelMorphService;

use Illuminate\Support\ServiceProvider;
use Kaveh\LaravelMorphService\Commands\RunMigrationsCommand;

class MorphServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RunMigrationsCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/Migrations/' => database_path('migrations'),
            ], 'migrations');
        }
    }
}