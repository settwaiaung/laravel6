<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SimpleProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Test', function(){
            return new \App\Test(config('mymail.test.key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
