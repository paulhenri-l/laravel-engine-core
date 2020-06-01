<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\Str;

trait ManagesPaths
{
    /**
     * The engine's base path.
     *
     * @var string|null
     */
    protected $engineBasePath;

    /**
     * Return the engine's path and add the given extra path if needed.
     */
    protected function basePath(string $extra = null): string
    {
        if (!$this->engineBasePath) {
            $engineBasePath = $this->getReflectedEngine()->getFileName();
            $engineBasePath = explode('/', $engineBasePath);
            $engineBasePath = array_slice($engineBasePath, 0, -2);
            $engineBasePath = implode('/', $engineBasePath);

            $this->engineBasePath = $engineBasePath;
        }

        return $this->engineBasePath . ($extra ? Str::start($extra, '/') : '');
    }

    /**
     * Return the engine's routes path and add the given extra path if needed.
     */
    protected function routesPath(string $extra = null): string
    {
        $extra = $extra
            ? Str::start($extra, '/')
            : '';

        return $this->basePath('routes' . $extra);
    }

    /**
     * Return the engine's helpers path and add the given extra path if needed.
     */
    protected function helpersPath(string $extra = null): string
    {
        $extra = $extra
            ? Str::start($extra, '/')
            : '';

        return $this->basePath('helpers' . $extra);
    }

    /**
     * Return the engine's lang path.
     */
    protected function langPath(): string
    {
        return $this->basePath('resources/lang');
    }

    /**
     * Return the engine's migrations path.
     */
    protected function migrationsPath(): string
    {
        return $this->basePath('migrations');
    }
}
