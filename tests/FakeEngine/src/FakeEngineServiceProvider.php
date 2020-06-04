<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine;

use Illuminate\Console\Scheduling\Schedule;
use PaulhenriL\LaravelEngine\EngineServiceProvider;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Console\Commands\HelloWorldCommand;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares\HelloMiddleware;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares\AppendedMiddleware;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares\PrependedMiddleware;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Listeners\HelloWorldListener;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Subscribers\HelloWorldSubscriber;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\View\Components\Bonjour;

class FakeEngineServiceProvider extends EngineServiceProvider
{
    public function register()
    {
        // Helpers
        $this->registerHelpers();

        // Config
        $this->registerConfig();
        $this->registerConfig('other_config');
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

        // Migrations
        $this->loadMigrations();

        // Views & Components
        $this->loadViews();
        $this->loadViews('CustomNamespace');
        $this->loadViewComponents([Bonjour::class]);
        $this->loadViewComponents([Bonjour::class], 'custom');
        $this->autoloadViewComponents();
        $this->autoloadViewComponents('custom');

        // Middlewares
        $this->appendApiMiddleware(AppendedMiddleware::class);
        $this->prependApiMiddleware(PrependedMiddleware::class);
        $this->appendWebMiddleware(AppendedMiddleware::class);
        $this->prependWebMiddleware(PrependedMiddleware::class);
        $this->appendGlobalMiddleware(AppendedMiddleware::class);
        $this->prependGlobalMiddleware(PrependedMiddleware::class);
    }
}
