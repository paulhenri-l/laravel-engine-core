<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Support\Str;

trait ManagesViewComponents
{
    /**
     * Autoload the engine's view components.
     */
    public function autoloadViewComponents(string $prefix = null): void
    {
        $this->loadViewComponents(
            $this->getClassesInSrc('View/Components'),
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
}
