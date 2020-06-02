<?php

namespace PaulhenriL\LaravelEngine\Tests\FakeEngine\View\Components;

use Illuminate\View\Component;

class Bonjour extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return 'Bonjour';
    }
}
