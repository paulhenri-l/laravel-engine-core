<?php

namespace PaulhenriL\LaravelEngine\Console\InstallTasks;

use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;

interface InstallTaskInterface
{
    /**
     * Run installation steps.
     */
    public function run(InstallCommand $command): void;
}
