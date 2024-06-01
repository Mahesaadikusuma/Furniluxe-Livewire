<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;


#[Layout('layouts.main')]
#[Title('Product Detail')]
class ProductDetail extends Component
{
    public $detail;
    public $products;
    public $showDescription  = false;
    public $showReviews  = false;


    public function mount($slug)
    {
        $this->detail = Product::where('slug', $slug)->firstOrFail();
        $this->deskripsi();
        $this->Products($slug);
    }

    public function Products($slug) {
        $this->products = Product::with(['category'])->where('slug', '!=', $slug)->get();
    }


    public function deskripsi() {
        $this->showDescription = true;
        $this->showReviews = false;
    }

    public function reviews()
    {
        $this->showDescription = false;
        $this->showReviews = true;
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}
