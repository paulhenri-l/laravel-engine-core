<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

trait ManagesViewComponents
{
    /**
     * Autoload the engine's view components.
     */
    public function autoloadViewComponents(string $prefix = null): void
    {
        $this->loadViewComponents(
            $this->getAvailableViewComponents(),
            $prefix
        );
    }

    /**
     * Load the given view components.
     */
    public function loadViewComponents(
        array $components,
        ?string $prefix = null
    ): void {
        $prefix = $prefix ?? Str::kebab($this->getEngineName());

        $this->loadViewComponentsAs($prefix, $components);
    }

    /**
     * Return all of the view components this engine has.
     */
    protected function getAvailableViewComponents(): array
    {
        $viewComponentsPath = $this->viewComponentsPath();
        $viewComponentFiles = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($viewComponentsPath)
        );

        $viewComponents = [];

        foreach ($viewComponentFiles as $viewComponentFile) {
            if ($viewComponentFile->isDir()){
                continue;
            }

            $viewComponent = $viewComponentFile->getPathname();
            $viewComponent = str_replace($viewComponentsPath . '/', '', $viewComponent);
            $viewComponent = str_replace('.php', '', $viewComponent);
            $viewComponent = str_replace('/', '\\', $viewComponent);

            $viewComponents[] = $this->getViewComponentsNamespace(
                $viewComponent
            );
        }

        return $viewComponents;
    }
}
