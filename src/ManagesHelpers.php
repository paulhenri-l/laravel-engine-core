<?php

namespace PaulhenriL\LaravelEngine;

trait ManagesHelpers
{
    /**
     * Load any helper file that may have been defined in the engine's helper
     * directory.
     */
    public function registerHelpers(): void
    {
        foreach (glob($this->helpersPath('*'), GLOB_NOSORT) as $helperFile) {
            require $helperFile;
        }
    }
}
