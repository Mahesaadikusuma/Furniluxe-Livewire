<?php

namespace App\Livewire\Pages\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;
    public $showModal = false;
    public $path = 'public/products';

    public $product;

    #[Validate("nullable|exists:categories,id")]
    public $category_id;

    #[Validate("nullable|string|min:3")]
    public $name = '';

    #[Validate("nullable|image|mimes:jpg,png")]
    public $image;

    #[Validate("nullable|string|min:5")]
    public $description;

    #[Validate("nullable|integer")]
    public $price;

    #[Validate("nullable|integer")]
    public $stok;


    public function modal_confirm() {
        $this->showModal = true;
    }

    public function mount(Product $product) {
        
        $this->product = $product;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stok = $product->stok;
    }

    public function update(){
        $this->validate();

        $id = $this->product->id;
        $products = Product::FindOrFail($id);

        if ($this->image) {
            Storage::disk('local')->delete($products->image);
            $imagePath = $this->image->storeAs(path: $this->path, name: $this->image->hashName());
        }
        
        $products->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $imagePath ?? $products->image,
            'price' => $this->price,
            'stok' => $this->stok,
        ]);

        return $this->redirect('/Admin/product', navigate:true);
        
    }

    public function render()
    {
        $category = Category::all();
        return view('livewire.pages.admin.product.edit', compact('category'));
    }
}
