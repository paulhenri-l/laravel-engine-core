<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Console\Scheduling\Schedule;

trait ManagesCommands
{
    /**
     * Autoload all the commands that are in the `Console/Commands` directory.
     */
    public function autoloadCommands(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->loadCommand(
            ...$this->getClassesInSrc('Console/Commands')
        );
    }

    /**
     * Load the given commands in the parent application.
     */
    public function loadCommand(string ...$commands): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands($commands);
    }

    /**
     * Apply the given function on the scheduler.
     */
    public function editSchedule(callable $editor): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->app->booted(function () use ($editor) {
            $schedule = $this->app->make(Schedule::class);

            $editor($schedule);
        });
    }
}
