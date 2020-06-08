<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\InstallTasks\PublishViews;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class PublishViewsTasksTest extends TestCase
{
    public function test_views_are_published()
    {
        $this->loadInstallTask(PublishViews::class);

        $translationsDir = realpath(__DIR__ . '/../../FakeEngine/resources/views');

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . PublishViews::class . ']')
            ->expectsOutput("Copied Directory [{$translationsDir}] To [/resources/views/vendor/FakeEngine]")
            ->expectsOutput('Publishing complete.');

        $this->assertTrue(file_exists(resource_path('views/vendor/FakeEngine')));
    }
}
