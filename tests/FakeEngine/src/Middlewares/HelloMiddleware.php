<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Middlewares;

class HelloMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
