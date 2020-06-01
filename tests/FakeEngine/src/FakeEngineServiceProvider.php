<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine;

use PaulhenriL\LaravelEngine\EngineServiceProvider;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Commands\HelloWorld;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Middlewares\HelloMiddleware;

class FakeEngineServiceProvider extends EngineServiceProvider
{
    public function register()
    {
        // Helpers
        $this->registerHelpers();
    }

    public function boot()
    {
        // Routes
        $this->loadWebRoutes();
        $this->loadApiRoutes();
        $this->loadWebRoutes('custom-prefix', 'custom_name.');
        $this->loadApiRoutes('custom-prefix', 'custom_name.');
        $this->loadRoutes(
            $this->routesPath('custom.php'),
            [HelloMiddleware::class],
            'custom-routes',
            'custom_routes.'
        );

        // Commands
        $this->loadCommand(HelloWorld::class);
    }
}
