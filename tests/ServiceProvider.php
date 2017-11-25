<?php

namespace Fico7489\Laravel\RevisionableUpgrade\Tests;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        //register
    }
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
    }
        
    private function loadMigrationsFrom($path)
    {
        \Artisan::call('migrate', ['--database' => 'testbench']);
        $migrator = $this->app->make('migrator');
        $migrator->run($path);
    }
}