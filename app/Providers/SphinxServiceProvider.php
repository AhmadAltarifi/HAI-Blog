<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Foolz\SphinxQL\Drivers\Mysqli\Connection;
use Foolz\SphinxQL\SphinxQL;

class SphinxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('sphinx', function () {
            $conn = new Connection();
            $conn->setParams([
                'host' => env('SPHINX_HOST'),
                'port' => env('SPHINX_PORT'),
            ]);
            return new SphinxQL($conn);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
