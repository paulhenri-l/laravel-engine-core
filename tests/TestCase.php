<?php

namespace PaulhenriL\LaravelEngine\Tests;

use PaulhenriL\LaravelEngine\Tests\FakeEngine\FakeEngineServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Load any needed package providers in the test application.
     */
    protected function getPackageProviders($app)
    {
        return [
            FakeEngineServiceProvider::class
        ];
    }
}
