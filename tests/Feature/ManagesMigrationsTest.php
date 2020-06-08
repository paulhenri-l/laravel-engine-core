<?php

namespace PaulhenriL\LaravelEngineCore\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use PaulhenriL\LaravelEngineCore\Tests\TestCase;

class ManagesMigrationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_migrations_ran()
    {
        $this->assertTrue(Schema::hasTable('hello_world'));
    }
}
