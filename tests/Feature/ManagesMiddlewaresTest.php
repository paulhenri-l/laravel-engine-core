<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Contracts\Http\Kernel;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares\AppendedMiddleware;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares\PrependedMiddleware;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesMiddlewaresTest extends TestCase
{
    public function test_api_middleware_has_been_appended()
    {
        $middlewares = $this->app->make(Kernel::class)->getMiddlewareGroups();

        $this->assertEquals(
            AppendedMiddleware::class,
            array_pop($middlewares['api'])
        );
    }

    public function test_api_middleware_has_been_prepended()
    {
        $middlewares = $this->app->make(Kernel::class)->getMiddlewareGroups();

        $this->assertEquals(
            PrependedMiddleware::class,
            array_shift($middlewares['api'])
        );
    }

    public function test_web_middleware_has_been_appended()
    {
        $middlewares = $this->app->make(Kernel::class)->getMiddlewareGroups();

        $this->assertEquals(
            AppendedMiddleware::class,
            array_pop($middlewares['web'])
        );
    }

    public function test_web_middleware_has_been_prepended()
    {
        $middlewares = $this->app->make(Kernel::class)->getMiddlewareGroups();

        $this->assertEquals(
            PrependedMiddleware::class,
            array_shift($middlewares['web'])
        );
    }

    public function test_global_middleware_has_been_appended()
    {
        $kernel = $this->app->make(Kernel::class);
        $reflectedKernel = new \ReflectionClass($kernel);
        $middlewares = $reflectedKernel->getProperty('middleware');
        $middlewares->setAccessible(true);
        $middlewares = $middlewares->getValue($kernel);

        $this->assertEquals(
            AppendedMiddleware::class, array_pop($middlewares)
        );
    }

    public function test_global_middleware_has_been_prepended()
    {
        $kernel = $this->app->make(Kernel::class);
        $reflectedKernel = new \ReflectionClass($kernel);
        $middlewares = $reflectedKernel->getProperty('middleware');
        $middlewares->setAccessible(true);
        $middlewares = $middlewares->getValue($kernel);

        $this->assertEquals(
            PrependedMiddleware::class, array_shift($middlewares)
        );
    }
}
