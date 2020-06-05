<?php

namespace PaulhenriL\LaravelEngine\Console\InstallTasks;

use Illuminate\Support\Str;
use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;

class PublishAssets implements InstallTaskInterface
{
    /**
     * Publish the engine's assets.
     */
    public function run(InstallCommand $command): void
    {
        $command->call('vendor:publish', [
            '--tag' => [Str::snake($command->getEngineName()) . '_assets']
        ]);
    }
}
