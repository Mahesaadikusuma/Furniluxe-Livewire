<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.main')]
#[Title('Home Page')]
class HomePage extends Component
{
    public function render()
    {
        $category = Category::take(4)->get();
        $product = Product::with(['category'])->take(4)->get();

        return view('livewire.home-page', [
            'category' => $category,
            'product' => $product
        ]);
    }
}
