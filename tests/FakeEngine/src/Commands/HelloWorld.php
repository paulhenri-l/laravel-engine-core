<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Commands;

use Illuminate\Console\Command;

class HelloWorld extends Command
{
    protected $signature = 'fake-engine:hello-world';

    protected $description = 'Greet the world!';

    public function handle()
    {
        $this->info('Hello World!');
    }
}
