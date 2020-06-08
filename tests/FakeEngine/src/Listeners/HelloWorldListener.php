<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\Listeners;

class HelloWorldListener
{
    /**
     * Has the listener been called?
     *
     * @var bool
     */
    public static $called = false;

    /**
     * Handle the event.
     */
    public function handle()
    {
        static::$called = true;
    }
}
