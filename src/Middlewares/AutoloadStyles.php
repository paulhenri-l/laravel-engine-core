<?php

namespace PaulhenriL\LaravelEngine\Middlewares;

use PaulhenriL\LaravelEngine\Exceptions\FragmentNotFoundException;
use PaulhenriL\LaravelEngine\Services\ResponseEditor;

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
