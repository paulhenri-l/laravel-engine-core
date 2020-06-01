<?php

namespace PaulhenriL\LaravelEngine;

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
}
