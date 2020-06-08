<?php

namespace PaulhenriL\LaravelEngineCore\Middlewares;

use PaulhenriL\LaravelEngineCore\Exceptions\FragmentNotFoundException;
use PaulhenriL\LaravelEngineCore\Services\ResponseEditor;

class AutoloadStyles extends AssetsAutoloaderMiddleware
{
    /**
     * Autoload styles in the response.
     */
    protected function autoload($response, array $assets): void
    {
        try {
            ResponseEditor::addStyles($response, $assets);
        } catch (FragmentNotFoundException $e) {
            //
        }
    }
}
