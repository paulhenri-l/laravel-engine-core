<?php

namespace PaulhenriL\LaravelEngine\Tests;

use Illuminate\Contracts\Console\Kernel;
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

        parent::tearDown();
    }

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app->make('config')->set(
            'app.key', '00000000000000000000000000000000'
        );
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
        // instance use by the EngineService provider won't be the same as the
        // one used in the TestCase. (This issue only happens with orchestra)
        $app->make(Kernel::class);
    }
}
