<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Product')]
#[Layout("layouts.main")]

class DetailProduct extends Component
{
    public function render()
    {
        return view('livewire.detail-product');
    }
}
