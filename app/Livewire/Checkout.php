<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Checkout Product')]
#[Layout("layouts.main")]

class Checkout extends Component
{
    public $qty = 1;
    public $shipping = 15000;
    public $tax = 2000;
    public $price = 150000;
    public $total;


    public function render()
    {
        return view('livewire.checkout');
    }

    public function mount()
    {
        $this->calculateTotal();
    }

    public function increment()
    {
        $this->qty++;
        $this->calculatePrice();
    }

    public function decrement()
    {
        if ($this->qty > 1) {
            $this->qty--;
            $this->calculatePrice();
        }
    }

    private function calculatePrice()
    {
        if ($this->qty <= 1) {
            $this->price = 150000;
        } else {
            $this->price = 150000 * $this->qty;
        }
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $this->total = $this->price + $this->shipping + $this->tax;
    }
}
