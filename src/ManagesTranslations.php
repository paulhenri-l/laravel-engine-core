<?php

namespace PaulhenriL\LaravelEngineCore;

use Illuminate\Support\Str;

trait ManagesTranslations
{
    /**
     * Load all the translations available in the engine's lang directory.
     */
    public function loadTranslations(
        string $namespace = null,
        bool $publishable = true
    ): void {
        $langPath = $this->langPath();
        $namespace = $namespace ?? $this->getEngineName();

        $this->loadTranslationsFrom($langPath, $namespace);

        if ($publishable) {
            $this->publishes([
              $langPath  => resource_path('lang/vendor/' . $this->getEngineName()),
            ], $this->translationsGroup());
        }
    }

    /**
     * The engine's translations publishable group.
     */
    protected function translationsGroup(): string
    {
        return Str::snake($this->getEngineName()) . '_translations';
    }
}
