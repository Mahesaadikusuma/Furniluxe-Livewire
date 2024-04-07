<?php

namespace App\View\Components\card;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class category extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $image,
        public string $href,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card.category');
    }
}
