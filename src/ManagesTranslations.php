<?php

namespace PaulhenriL\LaravelEngine;

trait ManagesTranslations
{
    /**
     * Load all the translations available in the engine's lang directory.
     */
    public function loadTranslations(string $namespace = null)
    {
        $this->loadTranslationsFrom(
            $this->langPath(), $namespace ?? $this->getEngineName()
        );
    }
}
