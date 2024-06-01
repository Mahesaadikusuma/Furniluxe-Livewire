<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component

{       
    use WithFileUploads;

    #[Validate("required|exists:categories,id")]
    public $category_id;

    #[Validate("required|string|min:3")]
    public $name = '';

    #[Validate("required|image|mimes:jpg,png")]
    public $image;

    #[Validate("required|string|min:5")]
    public $description;

    #[Validate("required|integer")]
    public $price;

    #[Validate("required|integer")]
    public $stok;


    public $showModal = false;


     public function modal_confirm() {
        $this->showModal = true;
        
    }

    public function store()
    {
        $this->validate();

        $namePath  = $this->image->hashName();
        $path = $this->image->storeAs("product", $namePath, "public");

        $product = Product::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $path,
            'price' => $this->price,
            'stok' => $this->stok,
        ]);

        
        $this->reset('name', 'description', 'image', 'price', 'stok','category_id');
        session()->flash('success', 'product created successfully');
        // $this->dispatch('updateProduct');

        return redirect()->route('product');
    }
    public function render()
    {
        $category  = Category::all();
        return view('livewire.product.product-create',[
            'category' => $category
        ]);
    }
}
