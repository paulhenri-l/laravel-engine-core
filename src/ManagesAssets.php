<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\Str;

trait ManagesAssets
{
    /**
     * Load the engine's assets in the parent application.
     */
    public function loadAssets(): void
    {
        $this->publishes([
            $this->assetsPath() => public_path('vendor/' . $this->getEngineName()),
        ], $this->assetsGroup());
    }

    /**
     * The engine's public assets publishable group.
     */
    protected function assetsGroup(): string
    {
        return Str::snake($this->getEngineName()) . '_assets';
    }
}
