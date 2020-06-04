<?php

namespace PaulhenriL\LaravelEngine;

use Illuminate\Contracts\Http\Kernel;

trait ManagesMiddlewares
{
    /**
     * The Kernel instance.
     *
     * @var Kernel|null
     */
    protected $kernel;

    /**
     * Append the given middleware to the web group.
     */
    protected function appendApiMiddleware(string $middleware): void
    {
        $this->appendMiddlewareToGroup('api', $middleware);
    }

    /**
     * Prepend the given middleware to the web group.
     */
    protected function prependApiMiddleware(string $middleware): void
    {
        $this->prependMiddlewareToGroup('api', $middleware);
    }

    /**
     * Append the given middleware to the web group.
     */
    protected function appendWebMiddleware(string $middleware): void
    {
        $this->appendMiddlewareToGroup('web', $middleware);
    }

    /**
     * Prepend the given middleware to the web group.
     */
    protected function prependWebMiddleware(string $middleware): void
    {
        $this->prependMiddlewareToGroup('web', $middleware);
    }

    /**
     * Prepend the given middleware to the global application middleware stack.
     */
    protected function appendGlobalMiddleware(string $middleware): void
    {
        $this->getHttpKernel()->pushMiddleware($middleware);
    }

    /**
     * Prepend the given middleware to the global application middleware stack.
     */
    protected function prependGlobalMiddleware(string $middleware): void
    {
        $this->getHttpKernel()->prependMiddleware($middleware);
    }

    /**
     * Append the given middleware to the given group.
     */
    protected function appendMiddlewareToGroup(
        string $group,
        string $middleware
    ) {
        $this->getHttpKernel()->appendMiddlewareToGroup($group, $middleware);
    }

    /**
     * Prepend the given middleware to the given group.
     */
    protected function prependMiddlewareToGroup(
        string $group,
        string $middleware
    ) {
        $this->getHttpKernel()->prependMiddlewareToGroup($group, $middleware);
    }

    /**
     * Return the Http Kernel.
     */
    protected function getHttpKernel(): Kernel
    {
        if (!$this->kernel) {
            $this->kernel = $this->app->make(Kernel::class);
        }

        return $this->kernel;
    }
}
