<?php

namespace PaulhenriL\LaravelEngineCore\Console\InstallTasks;

use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;

class PublishEverything implements InstallTaskInterface
{
    /**
     * Publish the engine's publishable files.
     */
    public function __invoke(InstallCommand $command): void
    {
        $command->call('vendor:publish', [
            '--provider' => get_class($command->getEngine())
        ]);
    }
}
