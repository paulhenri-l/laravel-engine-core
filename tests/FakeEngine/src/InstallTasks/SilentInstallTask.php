<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;
use PaulhenriL\LaravelEngineCore\Console\InstallTasks\InstallTaskInterface;

class SilentInstallTask implements InstallTaskInterface
{
    public function run(InstallCommand $command): void
    {
        // This task does not output anything.
    }
}
