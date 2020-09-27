<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;
use PaulhenriL\LaravelEngineCore\Console\InstallTasks\InstallTaskInterface;

class HelloWorldInstallTask implements InstallTaskInterface
{
    public function __invoke(InstallCommand $command): void
    {
        $command->info('Hello World!');
    }
}
