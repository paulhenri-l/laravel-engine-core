<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\CachesConfiguration;
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

    /**
     * Merge the given config in the given key. This is useful to share config
     * with another engine or package.
     */
    protected function shareConfig(string $key, array $config): void
    {
        if ($this->configIsCached()) {
            return;
        }

        config()->set($key, array_merge(
            config()->get($key), $config
        ));
    }

    /**
     * Is the config cached?
     */
    protected function configIsCached(): bool
    {
        return $this->app instanceof CachesConfiguration
            && $this->app->configurationIsCached();
    }
}
