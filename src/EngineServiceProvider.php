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
        ManagesConfig;

    /**
     * The engine's reflection.
     *
     * @var ReflectionClass
     */
    protected $reflectedEngine;

    /**
     * The engine's configuration publishable config group.
     */
    protected function configGroup(): string
    {
        return Str::snake($this->getEngineName()) . '_config';
    }

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
