<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesNamesTest extends TestCase
{
    public function test_an_engine_can_return_its_name()
    {
        $this->assertEquals('FakeEngine', $this->engine->getEngineName());
    }

    public function test_an_engine_can_return_its_namespace()
    {
        $this->assertEquals(
            'PaulhenriL\\LaravelEngine\\Tests\FakeEngine',
            $this->engine->getNamespace()
        );
    }

    public function test_that_an_extra_can_be_added_to_the_namespace()
    {
        $this->assertEquals(
            'PaulhenriL\\LaravelEngine\\Tests\FakeEngine\\Controllers',
            $this->engine->getNamespace('Controllers')
        );
    }

    public function test_an_engine_can_return_its_controller_namespace()
    {
        $this->assertEquals(
            'PaulhenriL\LaravelEngine\Tests\FakeEngine\Controllers',
            $this->engine->getControllersNamespace()
        );
    }

    public function test_that_an_extra_namespace_can_ba_added_to_the_controllers_namespace()
    {
        $this->assertEquals(
            'PaulhenriL\LaravelEngine\Tests\FakeEngine\Controllers\Api',
            $this->engine->getControllersNamespace('Api')
        );

        $this->assertEquals(
            'PaulhenriL\LaravelEngine\Tests\FakeEngine\Controllers\Api',
            $this->engine->getControllersNamespace('\Api')
        );
    }
}
