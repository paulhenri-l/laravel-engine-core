<?php

namespace PaulhenriL\LaravelEngineCore\Console\InstallTasks;

use Illuminate\Support\Str;
use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;

class PublishTranslations implements InstallTaskInterface
{
    /**
     * Publish the engine's assets.
     */
    public function __invoke(InstallCommand $command): void
    {
        $command->call('vendor:publish', [
            '--tag' => [
                Str::snake($command->getEngine()->getEngineName()) . '_translations'
            ]
        ]);
    }
}
