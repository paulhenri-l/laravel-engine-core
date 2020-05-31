<?php

namespace PaulhenriL\LaravelEngine\Tests;

use PaulhenriL\LaravelEngine\Tests\FakeEngine\FakeEngineServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /* @var FakeEngineServiceProvider */
    protected $engine;

    protected function setUp(): void
    {
        parent::setUp();

        $this->engine = new FakeEngineServiceProvider($this->app);
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
}
