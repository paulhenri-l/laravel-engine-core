<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Console\Application;
use Illuminate\Console\Application as Artisan;
use PaulhenriL\LaravelEngine\Console\Commands\InstallCommand;

trait ManagesInstallCommand
{
    /**
     * Add a command to install the engine in the parent application.
     */
    protected function addInstallCommand(...$tasks): void
    {
        if (count($tasks) == 1 && is_array($tasks[0])) {
            $tasks = $tasks[0];
        }

        if(!$this->app->runningInConsole()) {
            return;
        }

        Artisan::starting(function (Application $artisan) use ($tasks) {
            $artisan->add(new InstallCommand($this, $tasks));
        });
    }
}
