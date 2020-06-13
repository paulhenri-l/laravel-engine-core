<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature;

use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class ManagesInstallCommand extends TestCase
{
    public function test_install_command_loaded_and_tasks_run()
    {
        $this->artisan('fake-engine:install')
            ->expectsOutput('[PaulhenriL\LaravelEngineCore\Tests\FakeEngine\InstallTasks\HelloWorldInstallTask]')
            ->expectsOutput('  Hello World!')
            ->expectsOutput('  ')
            ->expectsOutput('[PaulhenriL\LaravelEngineCore\Tests\FakeEngine\InstallTasks\SilentInstallTask]')
            ->expectsOutput('  SilentInstallTask Complete.')
            ->expectsOutput('  ')
            ->expectsOutput('FakeEngine installed 🎉');
    }
}
