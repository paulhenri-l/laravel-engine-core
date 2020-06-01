<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Console\Scheduling\Schedule;

trait ManagesCommands
{
    /**
     * Load the given commands in the parent application.
     */
    public function loadCommand(string ...$commands)
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands($commands);
    }

    /**
     * Apply the given function on the scheduler.
     */
    public function editSchedule(callable $editor)
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
