<?php

namespace PaulhenriL\LaravelEngine\Console\InstallTasks;

use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;

class SymlinkAssets implements InstallTaskInterface
{
    /**
     * Publish the engine's assets.
     */
    public function run(InstallCommand $command): void
    {
//        $command->call('vendor:publish', [
//            '--tag' => [Str::snake($command->getEngineName()) . '_assets']
//        ]);
    }
}
