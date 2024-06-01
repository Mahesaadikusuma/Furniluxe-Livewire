<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

#[Layout('layouts.main')]
#[Title('Categories')]
class Categories extends Component
{   
    // WithoutUrlPagination
    use WithPagination;

    #[Url()]
    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {   
        // $product = Product::with(['category'])->get();
        $product = Product::with(['category'])->where('name', 'like', '%' . $this->query . '%')->paginate(4);
        $category = Category::all();
        return view('livewire.categories', [
            'product' => $product,
            'category' => $category
        ]);
    }
}
