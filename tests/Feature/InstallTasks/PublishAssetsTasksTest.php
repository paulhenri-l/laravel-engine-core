<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\InstallTasks\PublishAssets;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class PublishAssetsTasksTest extends TestCase
{
    public function test_assets_are_published()
    {
        $this->loadInstallTask(PublishAssets::class);

        $source = realpath(__DIR__ . '/../../FakeEngine/public');

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . PublishAssets::class . ']')
            ->expectsOutput("Copied Directory [{$source}] To [/public/vendor/FakeEngine]")
            ->expectsOutput('Publishing complete.');

        $this->assertTrue(file_exists(public_path('vendor/FakeEngine')));
    }
}
