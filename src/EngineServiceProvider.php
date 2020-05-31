<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;

class EngineServiceProvider extends ServiceProvider
{
    use ManagesRoutes,
        ManagesNames,
        ManagesPaths;

    /**
     * The engine's reflection.
     *
     * @var ReflectionClass
     */
    protected $reflectedEngine;

    // Middlewares
    // Assets symlink
    // Install command
    // Install tasks
    // Load helpers

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
