<?php

namespace PaulhenriL\LaravelEngine;

trait ManagesMigrations
{
    /**
     * Load all the translations available in the engine's lang directory.
     */
    public function loadMigrations(string $namespace = null)
    {
        $this->loadMigrationsFrom(
            $this->migrationsPath()
        );
    }
}
