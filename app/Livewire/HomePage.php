<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('HomePage')]
#[Layout("layouts.main")]

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page');
    }
}
