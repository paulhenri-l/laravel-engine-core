<?php

namespace PaulhenriL\LaravelEngineCore;

use Closure;
use Illuminate\Support\Facades\Event;

trait ManagesListeners
{
    /**
     * Add the given listener for the given event in the Dispatcher.
     *
     * @param string|array $event
     * @param string|Closure $listener
     *
     * @return void
     */
    protected function addListener($event, $listener): void
    {
        $events = (array)$event;

        Event::listen($events, $listener);
    }

    /**
     * Add the given subscriber in the Dispatcher.
     */
    protected function addSubscriber(string $subscriber): void
    {
        Event::subscribe($subscriber);
    }
}
