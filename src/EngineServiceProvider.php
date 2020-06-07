<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;

abstract class EngineServiceProvider extends ServiceProvider
{
    use ManagesAssets,
        ManagesCommands,
        ManagesConfig,
        ManagesHelpers,
        ManagesInstallCommand,
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

    /**
     * Recursively look for php classes in the given directory.
     */
    protected function getClassesInSrc(string $path): array
    {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $this->basePath('/src' . Str::start($path, '/'))
            )
        );

        $classes = [];

        foreach ($files as $file) {
            if ($file->isDir()) {
                continue;
            }

            $command = $file->getPathname();
            $command = str_replace($this->basePath('src') . '/', '', $command);
            $command = str_replace('.php', '', $command);
            $command = str_replace('/', '\\', $command);

            $classes[] = $this->getNamespace($command);
        }

        return $classes;
    }
}
