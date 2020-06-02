<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use ReflectionClass;

class EngineServiceProvider extends ServiceProvider
{
    use ManagesRoutes,
        ManagesNames,
        ManagesPaths,
        ManagesHelpers,
        ManagesCommands,
        ManagesListeners,
        ManagesTranslations,
        ManagesMigrations,
        ManagesConfig,
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
