<?php

namespace PaulhenriL\LaravelEngineCore;

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
     * Autoregister all of the engine's config files.
     */
    public function autoregisterConfig(bool $publishable = true)
    {
        foreach (glob($this->configPath('*'), GLOB_NOSORT) as $configFile) {
            $configName = explode('/', $configFile);
            $configName = array_slice($configName, -1, 1)[0];
            $configName = str_replace('.php', '', $configName);

            $this->registerConfig($configName, $publishable);
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
            config()->get($key) ?? [], $config
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
