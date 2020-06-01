<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\Subscribers;

use Illuminate\Events\Dispatcher;

class HelloWorldSubscriber
{
    public static $called = false;

    public function handleEvent()
    {
        static::$called = true;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'fake-engine:fake-subscribed-event',
            'PaulhenriL\LaravelEngine\Tests\FakeEngine\Subscribers\HelloWorldSubscriber@handleEvent'
        );
    }
}
