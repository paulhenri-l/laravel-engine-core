<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Http\Controllers;

use Illuminate\Routing\Controller;

class CustomHelloController extends Controller
{
    public function index()
    {
        return 'Hello from custom route';
    }
}
