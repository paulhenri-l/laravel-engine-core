<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Console\Scheduling\Schedule;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesCommandsTest extends TestCase
{
    public function test_that_commands_can_be_loaded()
    {
        $this->artisan(
            'fake-engine:hello-world'
        )->expectsOutput('Hello World!');
    }

    public function test_that_commands_can_be_autoloaded()
    {
        $this->artisan(
            'fake-engine:autoloaded'
        )->expectsOutput("I've been autoloaded");

        $this->artisan(
            'fake-engine:nested:autoloaded'
        )->expectsOutput("I've been autoloaded");
    }

    public function test_that_you_can_schedule_tasks()
    {
        /** @var Schedule $schedule */
        $schedule = $this->app->make(Schedule::class);

        $scheduledEvent = $schedule->events()[0];

        $this->assertEquals('* * * * *', $scheduledEvent->getExpression());
        $this->assertStringContainsString('fake-package:hello-world', $scheduledEvent->buildCommand());
    }
}
