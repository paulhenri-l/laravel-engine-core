<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;

class EngineServiceProvider extends ServiceProvider
{
    use ManagesAssets,
        ManagesCommands,
        ManagesConfig,
        ManagesHelpers,
        ManagesInstall,
        ManagesListeners,
        ManagesMiddlewares,
        ManagesMigrations,
        ManagesNames,
        ManagesPaths,
        ManagesRoutes,
        ManagesTranslations,
        ManagesViewComponents,
        ManagesViews;

    /**
     * The engine's reflection.
     *
     * @var ReflectionClass
     */
    protected $reflectedEngine;

    /**
     * Return the engine's reflection.
     */
    protected function getReflectedEngine(): ReflectionClass
    {
        if (!$this->reflectedEngine) {
            $this->reflectedEngine = new ReflectionClass($this);
        }

        return $this->reflectedEngine;
    }
}
