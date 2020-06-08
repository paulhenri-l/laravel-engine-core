<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature;

use PaulhenriL\LaravelEngineCore\Tests\TestCase;

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
