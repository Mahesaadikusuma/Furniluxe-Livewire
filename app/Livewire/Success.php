<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.main')]
#[Title('Checkout Success')]
class Success extends Component
{
    public function render()
    {
        return view('livewire.success');
    }
}
