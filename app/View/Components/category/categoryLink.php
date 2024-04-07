<?php

namespace App\View\Components\category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoryLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $href,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category.category-link');
    }
}
