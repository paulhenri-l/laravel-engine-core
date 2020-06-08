<?php

namespace PaulhenriL\LaravelEngineCore\Middlewares;

use PaulhenriL\LaravelEngineCore\Exceptions\FragmentNotFoundException;
use PaulhenriL\LaravelEngineCore\Services\ResponseEditor;

class AutoloadScripts extends AssetsAutoloaderMiddleware
{
    /**
     * Autoload scripts in the response.
     */
    protected function autoload($response, array $assets): void
    {
        try {
            ResponseEditor::addScripts($response, $assets);
        } catch (FragmentNotFoundException $e) {
            //
        }
    }
}
