<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Contracts\Foundation\CachesRoutes;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait ManagesRoutes
{
    /**
     * The engine's base routes prefix.
     *
     * @var string|null
     */
    protected $routesPrefix;

    /**
     * The engine's base routes name.
     *
     * @var string|null
     */
    protected $routesName;

    /**
     * Load the engine's web routes in the parent app.
     */
    protected function loadWebRoutes(
        string $prefix = null,
        string $name = null
    ): void {
        $this->loadRoutes(
            $this->routesPath('web.php'),
            'web',
            $prefix,
            $name
        );
    }

    /**
     * Load the engine's api routes in the parent app.
     */
    protected function loadApiRoutes(
        string $prefix = null,
        string $name = null
    ): void {
        $this->loadRoutes(
            $this->routesPath('api.php'),
            'api',
            $prefix,
            $name
        );
    }

    /**
     * Load the given routes in the parent app.
     */
    protected function loadRoutes(
        $routes,
        $middleware,
        ?string $prefix = null,
        ?string $name = null
    ): void {
        if (!$this->routesAreCached()) {
            Route::middleware($middleware)
                ->prefix($prefix ?? $this->getRoutesPrefix())
                ->name($name ?? $this->getRoutesName())
                ->namespace($this->getControllersNamespace())
                ->group($routes);
        }
    }

    /**
     * Are the application's routes cached?
     */
    protected function routesAreCached(): bool
    {
        return $this->app instanceof CachesRoutes
            && $this->app->routesAreCached();
    }

    /**
     * Return the engine's base route prefix.
     */
    protected function getRoutesPrefix(): string
    {
        if (!$this->routesPrefix) {
            $this->routesPrefix = Str::kebab($this->getEngineName());
        }

        return $this->routesPrefix;
    }

    /**
     * Return the engine's base route name.
     */
    protected function getRoutesName(): string
    {
        if (!$this->routesName) {
            $this->routesName = Str::snake($this->getEngineName()) . '.';
        }

        return $this->routesName;
    }
}
