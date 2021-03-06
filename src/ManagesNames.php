<?php

namespace PaulhenriL\LaravelEngineCore;

use Illuminate\Support\Str;

trait ManagesNames
{
    /**
     * The engine's name.
     *
     * @var string|null
     */
    protected $engineName;

    /**
     * The engine's namespace
     *
     * @var string|null
     */
    protected $namespace;

    /**
     * Return the engine's name.
     */
    public function getEngineName(): string
    {
        if (!$this->engineName) {
            $engineName = static::class;
            $engineName = explode('\\', $engineName);
            $engineName = array_pop($engineName);

            $this->engineName = str_replace('ServiceProvider', '', $engineName);
        }

        return $this->engineName;
    }

    /**
     * Return the engine's namespace and append the given extra if needed.
     */
    public function getNamespace(string $extra = null): string
    {
        if (!$this->namespace) {
            $this->namespace = $this->getReflectedEngine()->getNamespaceName();
        }

        return $this->namespace . ($extra ? Str::start($extra, '\\') : '');
    }

    /**
     * Return the engine's controllers namespace.
     */
    public function getControllersNamespace(): string
    {
        return $this->getNamespace('Http\Controllers');
    }
}
