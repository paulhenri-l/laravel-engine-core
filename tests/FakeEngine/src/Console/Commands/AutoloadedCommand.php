<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Console\Commands;

use Illuminate\Console\Command;

class AutoloadedCommand extends Command
{
    protected $signature = 'fake-engine:autoloaded';

    protected $description = 'Get autoloaded';

    public function handle()
    {
        $this->info("I've been autoloaded");
    }
}
