<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('layouts.main')]
#[Title('Categories')]
class CategorySlug extends Component
{
    public $category;
    public $categories;
    public $product;

    #[Url()]
    public $search = '';

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->firstOrFail();
        $this->categories = Category::all();

        // $this->product = Product::with(['category'])->where('category_id', $this->category->id)->get;
        $this->loadProduct();
    }

    public function loadProduct()
    {
        $queryProduct = Product::with(['category'])->where('category_id', $this->category->id);

        if ($this->search) {
            $queryProduct->where('name', 'like', '%' . $this->search . '%')->get();
        }

        $this->product = $queryProduct->get();
    }

    public function render()
    {
        return view('livewire.category-slug');
    }
}
