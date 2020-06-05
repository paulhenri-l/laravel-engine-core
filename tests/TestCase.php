<?php

namespace PaulhenriL\LaravelEngine\Tests;

use Illuminate\Console\Application;
use Illuminate\Console\Application as Artisan;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\File;
use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\FakeEngineServiceProvider;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Listeners\HelloWorldListener;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Subscribers\HelloWorldSubscriber;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /* @var FakeEngineServiceProvider */
    protected $engine;

    protected function setUp(): void
    {
        parent::setUp();

        $this->engine = new FakeEngineServiceProvider($this->app);
    }

    protected function tearDown(): void
    {
        HelloWorldListener::$called = false;
        HelloWorldSubscriber::$called = false;

        File::deleteDirectory(public_path('vendor'));
        File::deleteDirectory(resource_path('lang/vendor'));
        File::deleteDirectory(resource_path('views/vendor'));
        File::delete([
            config_path('fake_engine.php'),
            config_path('other_config.php'),
        ]);

        parent::tearDown();
    }

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app->make('config')->set(
            'app.key', '00000000000000000000000000000000'
        );

        $app->make('config')->set('database.default', 'sqlite');
        $app->make('config')->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            FakeEngineServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        // Prevents an awful bug from happening. Without this line The Kernel
        // instance used by the EngineServiceProvider won't be the same as the
        // one used in the TestCase. (This issue only happens with orchestra)
        $app->make(Kernel::class);
    }

    protected function loadInstallTask(string $taskClass)
    {
        Artisan::starting(function (Application $artisan) use ($taskClass) {
            $artisan->add(new InstallCommand(
                new FakeEngineServiceProvider($this->app),
                [$taskClass]
            ));
        });
    }
}
