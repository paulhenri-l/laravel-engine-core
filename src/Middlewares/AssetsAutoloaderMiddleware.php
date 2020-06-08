<?php

namespace PaulhenriL\LaravelEngineCore\Middlewares;

use Illuminate\Support\Str;

abstract class AssetsAutoloaderMiddleware
{
    /**
     * Autoload assets in the response if it's an HTML one.
     */
    public function handle($request, $next, $engineName, $assets)
    {
        $response = $next($request);

        if ($this->isHtmlResponse($response)) {
            $assets = $this->prefixAssets(
                $engineName, unserialize(base64_decode($assets))
            );

            $this->autoload($response, $assets);
        }

        return $response;
    }

    /**
     * Is the given response an html one?
     */
    protected function isHtmlResponse($response): bool
    {
        return Str::contains(
            $response->headers->get('Content-Type'), ['text/html']
        );
    }

    /**
     * Autoload the given assets in the response.
     */
    protected abstract function autoload($response, array $assets): void;

    /**
     * Prefix the given assets with the engine's path.
     */
    protected function prefixAssets(string $engineName, array $assets): array
    {
        return array_map(function ($asset) use ($engineName) {
            return asset("/vendor/{$engineName}" . Str::start($asset, '/'));
        }, $assets);
    }
}
