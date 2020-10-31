<?php

namespace SaeedVaziry\IP2Location;

use Illuminate\Support\ServiceProvider;
use SaeedVaziry\IP2Location\Commands\UpdateIPsCommand;

class IP2LocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // facade
        $this->app->bind('ip2location', function () {
            return new IP2Location();
        });

        // merge config file
        $this->mergeConfigFrom(__DIR__ . '/../config/ip2location.php', 'ip2location');

        // register command
        $this->app->singleton('command.ip2location.update', function () {
            return new UpdateIPsCommand();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // register command
        $this->commands(UpdateIPsCommand::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.ip2location.update'
        ];
    }
}
