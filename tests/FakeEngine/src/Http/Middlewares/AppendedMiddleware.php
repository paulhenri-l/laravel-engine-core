<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\Http\Middlewares;

class AppendedMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
