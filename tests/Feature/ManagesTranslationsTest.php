<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\TestCase;

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
}
