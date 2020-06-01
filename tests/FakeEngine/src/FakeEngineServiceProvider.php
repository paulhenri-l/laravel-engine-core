<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine;

use Illuminate\Console\Scheduling\Schedule;
use PaulhenriL\LaravelEngine\EngineServiceProvider;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Commands\HelloWorldCommand;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Listeners\HelloWorldListener;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Middlewares\HelloMiddleware;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Subscribers\HelloWorldSubscriber;

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
        $this->loadCommand(HelloWorldCommand::class);
        $this->editSchedule(function (Schedule $schedule) {
            $schedule->command('fake-package:hello-world')->everyMinute();
        });

        // Listeners / Subscribers
        $this->addListener('fake-engine:fake-event', HelloWorldListener::class);
        $this->addSubscriber(HelloWorldSubscriber::class);

        // Translations
        $this->loadTranslations();
        $this->loadTranslations('CustomNamespace');
    }
}
