<?php

namespace App\Livewire\Pages\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{

    public Product $product;
    public $showModal = false;


    public function mount()
    {
        $this->product->name;
    }


    public function delete_confirm() {
        $this->showModal = true;
    }

    public function delete()
    {
        $id = $this->product->id;
        $products = Product::findOrFail($id);

        if ($products->image) {
            Storage::disk('local')->delete($products->thumbnail);
        }
        $products->delete();
        return $this->redirect('/Admin/product', navigate:true);
    }

    public function render()
    {
        return view('livewire.pages.admin.product.delete');
    }
}
