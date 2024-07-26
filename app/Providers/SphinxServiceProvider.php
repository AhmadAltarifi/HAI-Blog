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
                'host' => env('SPHINX_HOST', '127.0.0.1'),
                'port' => env('SPHINX_PORT', 9306),
                'database' => env('SPHINX_DATABASE', 'hai_blog'),
                'username' => env('SPHINX_USERNAME', 'root'),
                'password' => env('SPHINX_PASSWORD', '')
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
