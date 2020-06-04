<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares;

class AppendedMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
