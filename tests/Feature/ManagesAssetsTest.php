<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Support\ServiceProvider;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesAssetsTest extends TestCase
{
    public function test_that_the_assets_are_publishable()
    {
        $assetsGroup = ServiceProvider::$publishGroups['fake_engine_assets'];

        $this->assertContains(
            public_path('vendor/FakeEngine'),
            $assetsGroup
        );
    }

    public function test_that_app_assets_are_autoloaded()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('fake_engine.assets_autoloading.index'));

        $style = asset('vendor/FakeEngine/css/app.css');
        $script = asset('vendor/FakeEngine/js/app.js');

        $response->assertSeeInOrder([
            '<head>',
            '<title>Hello World!</title>',
            "<link rel=\"stylesheet\" href=\"$style\">",
            '</head>',
            '<body>',
            'Hello World!',
            "<script src=\"$script\"></script>",
            '</body>',
        ], false);
    }

    public function test_that_custom_assets_are_autoloaded()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('fake_engine.assets_autoloading.index'));

        $style = asset('vendor/FakeEngine/css/custom_app.css');
        $script = asset('vendor/FakeEngine/js/custom_app.js');

        $response->assertSeeInOrder([
            '<head>',
            '<title>Hello World!</title>',
            "<link rel=\"stylesheet\" href=\"$style\">",
            '</head>',
            '<body>',
            'Hello World!',
            "<script src=\"$script\"></script>",
            '</body>',
        ], false);
    }
}
