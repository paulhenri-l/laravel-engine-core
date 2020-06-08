<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\Http\Middlewares;

class PrependedMiddleware
{
    public function handle($request, $next)
    {
        return $next($request);
    }
}
