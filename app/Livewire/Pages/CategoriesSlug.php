<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination; // Tambahkan ini

#[Title('Categories')]
#[Layout('layouts.main')]

class CategoriesSlug extends Component
{
    use WithPagination; 

    public $category;
    public $categories;

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->firstOrFail();
        // $categoryCount = $this->category->count();
        // $this->categories = Category::all();
        $this->loadCategories();
    }


    public function loadCategories()
{
    $this->categories = Category::all();
}

    public function render()
    {
        $products = Product::with(['category'])
            ->where('category_id', $this->category->id)
            ->paginate(10);

        return view('livewire.pages.categories-slug', [
            'products' => $products,
        ]);
    }
}

