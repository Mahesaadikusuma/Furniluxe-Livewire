<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
#[Layout('layouts.main')]

class HomePage extends Component
{
    public function render()
    {
        $categories = Category::take(4)->get();
        $products = Product::with(['category'])->take(4)->get();
        return view('livewire.pages.home-page', compact('categories', 'products'));
    }
}
