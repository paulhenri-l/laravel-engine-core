<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;
use PaulhenriL\LaravelEngineCore\Console\InstallTasks\InstallTaskInterface;

class HelloWorldInstallTask implements InstallTaskInterface
{
    public function run(InstallCommand $command): void
    {
        $command->info('Hello World!');
    }
}
