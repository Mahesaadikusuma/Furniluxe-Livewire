<?php

namespace App\Livewire\Pages;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.main')]
#[Title('Cart')]
class CartIcon extends Component
{
    public $cartCount;

    public function mount()
    {
        $this->updateCart();
    }

    #[On('cartUpdated')]
    public function updateCart() 
    {
        $this->cartCount = Cart::where('user_id', Auth::user()->id)->count();
    }

    public function render()
    {
        return view('livewire.pages.cart-icon');
    }
}
