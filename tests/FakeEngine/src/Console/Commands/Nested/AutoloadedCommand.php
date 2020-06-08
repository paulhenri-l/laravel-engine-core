<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\Console\Commands\Nested;

use Illuminate\Console\Command;

class AutoloadedCommand extends Command
{
    protected $signature = 'fake-engine:nested:autoloaded';

    protected $description = 'Get autoloaded';

    public function handle()
    {
        $this->info("I've been autoloaded");
    }
}
