<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Categories')]
#[Layout('layouts.main')]
// #[Lazy()]
class Categories extends Component
{
    
    public $categories;
    // public $products;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        $products = Product::with(['category'])->paginate(10);
        return view('livewire.pages.categories',compact('products'));
    }
}
