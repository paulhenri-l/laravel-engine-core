<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\Str;

trait ManagesConfig
{
    /**
     * Register the engine's config.
     */
    public function registerConfig(
        string $prefix = null,
        bool $publishable = true
    ): void {
        $prefix = $prefix ?? Str::snake($this->getEngineName());
        $file = $prefix . '.php';

        $this->mergeConfigFrom(
            $this->configPath($file), $prefix
        );

        if ($publishable) {
            $this->publishes([
                $this->configPath($file) => config_path($file),
            ], $this->configGroup());
        }
    }

    /**
     * The engine's configuration publishable group.
     */
    protected function configGroup(): string
    {
        return Str::snake($this->getEngineName()) . '_config';
    }
}
