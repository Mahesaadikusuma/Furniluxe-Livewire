<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Models\Review;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.main')]
#[Title('Product Detail Review')]
class Productreviews extends Component
{
    public $showModal = false;
    public $product;
    public $reviews;

    public $reviewCount = 1;
    

    public function mount($slug)
    {
        $this->product = Product::with(['Reviews' => ['User']])->where('slug', $slug)->firstOrFail();
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = $this->product->Reviews()->with('user')->take($this->reviewCount)->get();
    }

    public function loadMore()
    {
        $this->reviewCount += 5; // Increase the count by a larger number
        $this->loadReviews(); // Reload reviews with updated count
    }

    public function modal_confirm()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.pages.productreviews');
    }
}
