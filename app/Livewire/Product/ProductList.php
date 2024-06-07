<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;


#[On('updateProduct')]

class ProductList extends Component
{

    public function removeTMP(){
        $oldFile = Storage::files('livewire-tmp');

        foreach ($oldFile as $file) {
            Storage::delete($file);
        }
        session()->flash('success', 'File livewire-tmp Deleted');
        // $this->dispatch('updateProduct');
        return redirect()->route('product');
    }
    

    public function render()
    {
        $product = Product::with(['category'])->paginate(10);
        return view('livewire.product.product-list',[
            'product' => $product
        ]);
    }
}
