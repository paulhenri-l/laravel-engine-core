<?php

namespace PaulhenriL\LaravelEngineCore\Console\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;

interface InstallTaskInterface
{
    /**
     * Run installation steps.
     */
    public function run(InstallCommand $command): void;
}
