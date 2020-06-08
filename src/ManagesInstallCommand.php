<?php

namespace PaulhenriL\LaravelEngineCore;

use Illuminate\Console\Application;
use Illuminate\Console\Application as Artisan;
use PaulhenriL\LaravelEngineCore\Console\Commands\InstallCommand;

trait ManagesInstallCommand
{
    /**
     * Add a command to install the engine in the parent application.
     */
    protected function addInstallCommand(...$tasks): void
    {
        if(!$this->app->runningInConsole()) {
            return;
        }

        if (count($tasks) == 1 && is_array($tasks[0])) {
            $tasks = $tasks[0];
        }

        Artisan::starting(function (Application $artisan) use ($tasks) {
            $artisan->add(new InstallCommand($this, $tasks));
        });
    }
}
