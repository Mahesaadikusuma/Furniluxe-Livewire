<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.main')]
#[Title('Checkout Success')]
class Success extends Component
{
    public function render()
    {
        return view('livewire.pages.success');
    }
}
