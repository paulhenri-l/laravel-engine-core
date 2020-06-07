<?php

namespace PaulhenriL\LaravelEngine\Middlewares;

use PaulhenriL\LaravelEngine\Exceptions\FragmentNotFoundException;
use PaulhenriL\LaravelEngine\Services\ResponseEditor;

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
