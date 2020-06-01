<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesCommandsTest extends TestCase
{
    public function test_that_commands_can_be_loaded()
    {
        $this->artisan(
            'fake-engine:hello-world'
        )->expectsOutput('Hello World!');
    }
}
