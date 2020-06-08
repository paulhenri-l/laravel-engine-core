<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\InstallTasks\PublishConfig;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class PublishConfigTasksTest extends TestCase
{
    public function test_config_is_published()
    {
        $this->loadInstallTask(PublishConfig::class);

        $config1 = realpath(__DIR__ . '/../../FakeEngine/config/fake_engine.php');
        $config2 = realpath(__DIR__ . '/../../FakeEngine/config/other_config.php');

        $this->artisan('fake-engine:install')
            ->expectsOutput('[' . PublishConfig::class . ']')
            ->expectsOutput("Copied File [{$config1}] To [/config/fake_engine.php]")
            ->expectsOutput("Copied File [{$config2}] To [/config/other_config.php]")
            ->expectsOutput('Publishing complete.');

        $this->assertTrue(file_exists(config_path('fake_engine.php')));
        $this->assertTrue(file_exists(config_path('other_config.php')));
    }
}
