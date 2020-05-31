<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Controllers;

use Illuminate\Routing\Controller;

class ApiHelloController extends Controller
{
    public function index()
    {
        return 'Hello from api route';
    }
}
