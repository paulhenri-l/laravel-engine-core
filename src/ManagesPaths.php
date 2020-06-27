<?php

namespace PaulhenriL\LaravelEngineCore;

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

    /**
     * Return the engine's lang path.
     */
    public function langPath(): string
    {
        return $this->basePath('resources/lang');
    }

    /**
     * Return the engine's migrations path.
     */
    public function migrationsPath(): string
    {
        return $this->basePath('database/migrations');
    }

    /**
     * Return the engine's config path and add the given extra path if needed.
     */
    public function configPath(string $extra = null): string
    {
        $extra = $extra
            ? Str::start($extra, '/')
            : '';

        return $this->basePath('config' . $extra);
    }

    /**
     * Return the engine's views path.
     */
    public function viewsPath(): string
    {
        return $this->basePath('resources/views');
    }

    /**
     * Return the engine's assets path.
     */
    public function assetsPath(): string
    {
        return $this->basePath('public');
    }
}
