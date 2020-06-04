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
}
