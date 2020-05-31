<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesPathsTest extends TestCase
{
    public function test_an_engine_can_return_its_path()
    {
        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine'),
            $this->engine->basePath()
        );
    }

    public function test_you_can_append_an_extra_path_to_an_engine_s_path()
    {
        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/src'),
            $this->engine->basePath('src')
        );

        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/src'),
            $this->engine->basePath('/src')
        );
    }

    public function test_the_routes_path()
    {
        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/routes'),
            $this->engine->routesPath()
        );
    }

    public function test_you_can_append_an_extra_path_to_the_routes_path()
    {
        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/routes/web.php'),
            $this->engine->routesPath('/web.php')
        );

        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/routes/web.php'),
            $this->engine->routesPath('web.php')
        );
    }

    public function test_the_helpers_path()
    {
        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/helpers'),
            $this->engine->helpersPath()
        );
    }

    public function test_you_can_append_an_extra_path_to_the_helpers_path()
    {
        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/helpers/helpers.php'),
            $this->engine->helpersPath('/helpers.php')
        );

        $this->assertEquals(
            realpath(__DIR__ . '/../FakeEngine/helpers/helpers.php'),
            $this->engine->helpersPath('helpers.php')
        );
    }
}
