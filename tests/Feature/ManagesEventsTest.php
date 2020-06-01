<?php

namespace PaulhenriL\LaravelEngine\Tests\Feature;

use Illuminate\Support\Facades\Event;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Listeners\HelloWorldListener;
use PaulhenriL\LaravelEngine\Tests\FakeEngine\Subscribers\HelloWorldSubscriber;
use PaulhenriL\LaravelEngine\Tests\TestCase;

class ManagesEventsTest extends TestCase
{
    public function test_that_listeners_can_be_registered()
    {
        $this->assertFalse(HelloWorldListener::$called);

        Event::dispatch('fake-engine:fake-event');

        $this->assertTrue(HelloWorldListener::$called);
    }

    public function test_that_subscribers_can_be_registered()
    {
        $this->assertFalse(HelloWorldSubscriber::$called);

        Event::dispatch('fake-engine:fake-subscribed-event');

        $this->assertTrue(HelloWorldSubscriber::$called);
    }
}

