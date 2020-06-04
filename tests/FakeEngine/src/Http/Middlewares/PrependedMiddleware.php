<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Middlewares;

class PrependedMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
