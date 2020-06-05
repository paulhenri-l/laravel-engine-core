<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngine\Console\InstallTasks\PublishEverything;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class PublishEverythingTest extends TestCase
{
    public function test_everything_is_published()
    {
        $this->loadInstallTask(PublishEverything::class);

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . PublishEverything::class . ']')
            ->expectsOutput('Publishing complete.');

        $this->assertTrue(file_exists(public_path('vendor/FakeEngine')));
        $this->assertTrue(file_exists(config_path('fake_engine.php')));
        $this->assertTrue(file_exists(config_path('other_config.php')));
        $this->assertTrue(file_exists(resource_path('lang/vendor/FakeEngine')));
        $this->assertTrue(file_exists(resource_path('views/vendor/FakeEngine')));
    }
}
