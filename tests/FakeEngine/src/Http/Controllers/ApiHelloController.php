<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\Http\Controllers;

use Illuminate\Routing\Controller;

class ApiHelloController extends Controller
{
    public function index()
    {
        return 'Hello from api route';
    }
}
