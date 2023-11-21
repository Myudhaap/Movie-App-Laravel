<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActorCard extends Component
{
    public $actor;
    public function __construct($actor)
    {
        $this->actor = $actor;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.actor-card');
    }
}
