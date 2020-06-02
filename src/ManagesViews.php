<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\Str;

trait ManagesViews
{
    /**
     * Load the engine's views in the parent app.
     */
    public function loadViews(
        string $namespace = null,
        bool $publishable = true
    ): void {
        $this->loadViewsFrom(
            $this->viewsPath(), $namespace ?? $this->getEngineName()
        );

        if ($publishable) {
            $this->publishes([
                $this->viewsPath() => resource_path('views/vendor/' . $this->getEngineName())
            ], $this->viewsGroup());
        }
    }

    /**
     * The engine's views publishable group.
     */
    protected function viewsGroup(): string
    {
        return Str::snake($this->getEngineName()) . '_views';
    }
}
