<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\InstallTasks;

use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;
use PaulhenriL\LaravelEngine\Console\InstallTasks\InstallTaskInterface;

class HelloWorldInstallTask implements InstallTaskInterface
{
    public function run(InstallCommand $command): void
    {
    }
}
