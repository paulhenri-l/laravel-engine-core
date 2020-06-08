<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\Http\Middlewares;

class HelloMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
