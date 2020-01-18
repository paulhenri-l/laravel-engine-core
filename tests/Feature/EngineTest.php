<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\FakeEngine\FakeEngineServiceProvider;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class EngineTest extends TestCase
{
    public function test_engine_is_loaded()
    {
        $this->assertArrayHasKey(
            FakeEngineServiceProvider::class,
            $this->app->getLoadedProviders()
        );
    }
}
