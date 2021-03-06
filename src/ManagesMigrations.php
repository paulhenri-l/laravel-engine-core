<?php

namespace PaulhenriL\LaravelEngineCore;

trait ManagesMigrations
{
    /**
     * Load all the translations available in the engine's lang directory.
     */
    public function loadMigrations(): void
    {
        $this->loadMigrationsFrom(
            $this->migrationsPath()
        );
    }
}
