<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesHelpersTest extends TestCase
{
    public function test_helpers_are_loaded()
    {
        $this->assertEquals(
            'Hello World', helloWorldHelper()
        );

        $this->assertEquals(
            'Bar', fooHelper()
        );
    }
}
