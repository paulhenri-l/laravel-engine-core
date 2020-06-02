<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares;

class HelloMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
