<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Controllers;

use Illuminate\Routing\Controller;

class CustomHelloController extends Controller
{
    public function index()
    {
        return 'Hello from custom route';
    }
}
