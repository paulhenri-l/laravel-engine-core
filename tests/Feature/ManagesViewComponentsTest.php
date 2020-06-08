<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature;

use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class ManagesViewComponentsTest extends TestCase
{
    public function test_that_view_components_can_be_manually_loaded()
    {
        $this->assertStringContainsString(
            'Bonjour',
            view('FakeEngine::manually_registered_component')->render()
        );
    }

    public function test_that_view_components_can_be_manually_loaded_with_a_custom_prefix()
    {
        $this->assertStringContainsString(
            'Bonjour',
            view('FakeEngine::custom_prefix_component')->render()
        );
    }

    public function test_that_view_components_can_be_autoloaded()
    {
        $this->assertStringContainsString(
            'Autoloaded bonjour',
            view('FakeEngine::autoloaded_component')->render()
        );

        $this->assertStringContainsString(
            'Nested autoloaded bonjour',
            view('FakeEngine::nested_autoloaded_component')->render()
        );
    }

    public function test_that_view_components_can_be_autoloaded_under_a_custom_prefix()
    {
        $this->assertStringContainsString(
            'Autoloaded bonjour',
            view('FakeEngine::custom_prefix_autoloaded_component')->render()
        );

        $this->assertStringContainsString(
            'Nested autoloaded bonjour',
            view('FakeEngine::custom_prefix_nested_autoloaded_component')->render()
        );
    }
}
