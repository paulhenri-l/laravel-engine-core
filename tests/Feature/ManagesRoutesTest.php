<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Routing\Router;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares\HelloMiddleware;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesRoutesTest extends TestCase
{
    public function test_web_routes_are_loaded()
    {
        $response1 = $this->get('fake-engine/hello');
        $response1->assertOk();
        $response1->assertSee('Hello from web route');

        $response2 = $this->get(route('fake_engine.hello.index'));
        $response2->assertOk();
        $response2->assertSee('Hello from web route');
    }

    public function test_web_routes_are_loaded_under_the_web_middleware()
    {
        $route = $this->app->make(Router::class)
            ->getRoutes()
            ->getByName('fake_engine.hello.index');

        $this->assertContains('web', $route->gatherMiddleware());
    }

    public function test_web_routes_are_loaded_under_custom_prefix_and_name()
    {
        $response1 = $this->get('custom-prefix/hello');
        $response1->assertOk();
        $response1->assertSee('Hello from web route');

        $response2 = $this->get(route('custom_name.hello.index'));
        $response2->assertOk();
        $response2->assertSee('Hello from web route');
    }

    public function test_api_routes_are_loaded()
    {
        $response1 = $this->get('fake-engine/api-hello');
        $response1->assertOk();
        $response1->assertSee('Hello from api route');

        $response2 = $this->get(route('fake_engine.api_hello.index'));
        $response2->assertOk();
        $response2->assertSee('Hello from api route');
    }

    public function test_api_routes_are_loaded_under_the_api_middleware()
    {
        $route = $this->app->make(Router::class)
            ->getRoutes()
            ->getByName('fake_engine.api_hello.index');

        $this->assertContains('api', $route->gatherMiddleware());
    }

    public function test_api_routes_are_loaded_under_custom_prefix_and_name()
    {
        $response1 = $this->get('custom-prefix/api-hello');
        $response1->assertOk();
        $response1->assertSee('Hello from api route');

        $response2 = $this->get(route('custom_name.api_hello.index'));
        $response2->assertOk();
        $response2->assertSee('Hello from api route');
    }

    public function test_custom_routes_can_be_loaded()
    {
        $response1 = $this->get('custom-routes/custom-hello');
        $response1->assertOk();
        $response1->assertSee('Hello from custom route');

        $response2 = $this->get(route('custom_routes.custom_hello.index'));
        $response2->assertOk();
        $response2->assertSee('Hello from custom route');

        $route = $this->app->make(Router::class)
            ->getRoutes()
            ->getByName('custom_routes.custom_hello.index');

        $this->assertContains(
            HelloMiddleware::class,
            $route->gatherMiddleware()
        );
    }
}
