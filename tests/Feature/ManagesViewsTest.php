<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Support\ServiceProvider;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesViewsTest extends TestCase
{
    public function test_views_are_loaded()
    {
        $this->assertStringContainsString(
            'Hello world!',
            view('FakeEngine::hello')->render()
        );
    }

    public function test_views_can_be_loaded_under_a_custom_namespace()
    {
        $this->assertStringContainsString(
            'Hello world!',
            view('CustomNamespace::hello')->render()
        );
    }

    public function test_that_the_views_are_publishable()
    {
        $viewsGroup = ServiceProvider::$publishGroups['fake_engine_views'];

        $this->assertContains(
            resource_path('views/vendor/FakeEngine'),
            $viewsGroup
        );
    }
}
