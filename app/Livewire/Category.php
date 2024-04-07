<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('HomePage')]
#[Layout("layouts.main")]

class Category extends Component
{
    public function render()
    {
        return view('livewire.category');
    }
}
