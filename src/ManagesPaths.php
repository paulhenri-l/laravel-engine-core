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
    public function basePath(string $extra = null): string
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
    public function routesPath(string $extra = null): string
    {
        $extra = $extra
            ? Str::start($extra, '/')
            : '';

        return $this->basePath('routes' . $extra);
    }

    /**
     * Return the engine's helpers path and add the given extra path if needed.
     */
    public function helpersPath(string $extra = null): string
    {
        $extra = $extra
            ? Str::start($extra, '/')
            : '';

        return $this->basePath('helpers' . $extra);
    }
}
