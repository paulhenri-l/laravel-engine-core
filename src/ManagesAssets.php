<?php

namespace PaulhenriL\LaravelEngineCore;

use Illuminate\Support\Str;
use PaulhenriL\LaravelEngineCore\Middlewares\AutoloadScripts;
use PaulhenriL\LaravelEngineCore\Middlewares\AutoloadStyles;

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
     * Automatically load the given scripts.
     */
    public function autoloadJs(array $scripts = null): void
    {
        $scripts = $scripts ?? ['js/app.js'];

        $this->appendWebMiddleware(
            AutoloadScripts::class . ':' .
            $this->getEngineName() . ',' .
            base64_encode(serialize($scripts))
        );
    }

    /**
     * Automatically load the given styles.
     */
    public function autoloadCss(array $styles = null): void
    {
        $styles = $styles ?? ['css/app.css'];

        $this->appendWebMiddleware(
            AutoloadStyles::class . ':' .
            $this->getEngineName() . ',' .
            base64_encode(serialize($styles))
        );
    }

    /**
     * The engine's public assets publishable group.
     */
    protected function assetsGroup(): string
    {
        return Str::snake($this->getEngineName()) . '_assets';
    }
}
