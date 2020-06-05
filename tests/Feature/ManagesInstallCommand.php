<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesInstallCommand extends TestCase
{
    public function test_install_command_loaded_and_tasks_run()
    {
        $this->artisan('fake-engine:install')
            ->expectsOutput('[PaulhenriL\LaravelEngine\Tests\FakeEngine\InstallTasks\HelloWorldInstallTask]')
            ->expectsOutput('  Hello World!')
            ->expectsOutput('[PaulhenriL\LaravelEngine\Tests\FakeEngine\InstallTasks\SilentInstallTask]')
            ->expectsOutput('  SilentInstallTask Complete.')
            ->expectsOutput('FakeEngine installed 🎉');
    }
}
