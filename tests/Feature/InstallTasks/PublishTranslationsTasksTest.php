<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\InstallTasks\PublishTranslations;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class PublishTranslationsTasksTest extends TestCase
{
    public function test_translations_published()
    {
        $this->loadInstallTask(PublishTranslations::class);

        $translationsDir = realpath(__DIR__ . '/../../FakeEngine/resources/lang');

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . PublishTranslations::class . ']')
            ->expectsOutput("Copied Directory [{$translationsDir}] To [/resources/lang/vendor/FakeEngine]")
            ->expectsOutput('Publishing complete.');

        $this->assertTrue(file_exists(resource_path('lang/vendor/FakeEngine')));
    }
}
