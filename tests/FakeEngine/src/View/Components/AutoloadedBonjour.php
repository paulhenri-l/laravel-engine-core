<?php

namespace PaulhenriL\LaravelEngineCore\Tests\FakeEngine\View\Components;

use Illuminate\View\Component;

class AutoloadedBonjour extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return 'Autoloaded bonjour';
    }
}
