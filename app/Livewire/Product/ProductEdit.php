<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{

    use WithFileUploads;

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


    public $showModal = false;
    public $product;
    public $productID;

    public function mount(Product $product) {
        $this->product = $product;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stok = $product->stok;
    }


    public function modal_confirm($id){
        $this->showModal = true;
        $this->productID = $id;
    }


    public function update(){
        $this->validate();

        $id = $this->productID;
        $products = Product::FindOrFail($id);

        if ($this->image) {
            if ($products->image) {
                Storage::disk('local')->delete('public/' . $products->image);
            }   
            $namePath  = $this->image->hashName();
            $path = $this->image->storeAs("product", $namePath, "public");
        }
        
        $products->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $path ?? $products->image,
            'price' => $this->price,
            'stok' => $this->stok,
        ]);

        return redirect()->route('product');
        
    }
    
    public function render()
    {   
        $category = Category::all();
        return view('livewire.product.product-edit',[
            'category' => $category
        ]);
    }
}
