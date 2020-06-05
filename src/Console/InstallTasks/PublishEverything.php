<?php

namespace PaulhenriL\LaravelEngine\Console\InstallTasks;

use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;

class PublishEverything implements InstallTaskInterface
{
    /**
     * Publish the engine's publishable files.
     */
    public function run(InstallCommand $command): void
    {
        $command->call('vendor:publish', [
            '--provider' => get_class($command->getEngine())
        ]);
    }
}
