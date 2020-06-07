<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Support\ServiceProvider;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesConfigTest extends TestCase
{
    public function test_that_the_config_is_loaded()
    {
        $this->assertEquals(config('fake_engine.hello'), 'world');
        $this->assertEquals(config('other_config.hola'), 'el mundo');
    }

    public function test_that_the_config_can_be_autoregisterd()
    {
        $this->assertEquals(config('autoloaded_config.auto'), 'loaded');
    }

    public function test_that_the_config_is_publishable()
    {
        $configGroup = ServiceProvider::$publishGroups['fake_engine_config'];

        $this->assertContains(config_path('fake_engine.php'), $configGroup);
        $this->assertContains(config_path('other_config.php'), $configGroup);
        $this->assertContains(config_path('autoloaded_config.php'), $configGroup);
    }

    public function test_that_config_can_be_shared()
    {
        $this->assertEquals([
            'foo', 'bar'
        ], config('other_engine.some_node'));
    }
}
