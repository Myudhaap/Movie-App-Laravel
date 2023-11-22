<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaginationView extends Component
{
    /**
     * Create a new component instance.
     */
    public $pagination;
    public $doted;
    public function __construct($pagination, $doted = 0)
    {
        $this->pagination = $pagination;
        $this->doted = $doted;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination-view');
    }
}
