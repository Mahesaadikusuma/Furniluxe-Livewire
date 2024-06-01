<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ProductDelete extends Component
{
    public $product;
    public $productId;

    public $showModal = false;

    public function mount(Product $product)
    {
        $this->product = $product;
    }



    public function delete_confirm($id) {
        $this->showModal = true;
        $this->productId = $id;
    }

    public function delete()
    {
        $id = $this->productId;
        // dd($id);
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('local')->delete('public/' . $product->image);
        }
        $product->delete();

        // $this->dispatch('deleteProduct');
        return redirect()->route('prodcut');
    }

    public function render()
    {
        return view('livewire.product.product-delete');
    }
}
