<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature;

use Illuminate\Support\ServiceProvider;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class ManagesTranslationsTest extends TestCase
{
    public function test_translations_are_loaded()
    {
        $this->app->setLocale('fr');

        $this->assertEquals(
            'Bonjour le monde !',
            trans('FakeEngine::greetings.hello_world')
        );
    }

    public function test_translations_can_be_loaded_under_a_custom_namespace()
    {
        $this->app->setLocale('fr');

        $this->assertEquals(
            'Bonjour le monde !',
            trans('CustomNamespace::greetings.hello_world')
        );
    }

    public function test_that_the_translations_are_publishable()
    {
        $translationsGroup = ServiceProvider::$publishGroups['fake_engine_translations'];

        $this->assertContains(
            resource_path('lang/vendor/FakeEngine'),
            $translationsGroup
        );
    }
}
