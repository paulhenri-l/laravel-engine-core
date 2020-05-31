<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Controllers;

use Illuminate\Routing\Controller;

class HelloController extends Controller
{
    public function index()
    {
        return 'Hello from web route';
    }
}
