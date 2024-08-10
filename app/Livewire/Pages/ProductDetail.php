<?php

namespace App\Livewire\Pages;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;


#[Layout('layouts.main')]
#[Title('Product Detail')]
class ProductDetail extends Component
{
    public $detailProduct;
    public $products;
    public $showDescription  = false;
    public $showReviews  = false;
    public $ReviewProduct;

    public function mount($slug)
    {
        $this->detailProduct = Product::with(['category', 'Reviews'])->where('slug', $slug)->firstOrFail();

        $this->ReviewProduct = $this->detailProduct->Reviews()->take(3)->get();
        $this->deskripsi();
        $this->loadOtherProducts($slug);
    }

    public function loadOtherProducts($slug) {
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


    public function addCart($ProductID)
    {
        $user = Auth::user();

        $cart = Cart::where('product_id', $ProductID)
            ->where('user_id', $user->id)->first();

        // dd($cart);
        if ($cart) {
            // $cart->increment('qty');
            if ($cart->qty < $cart->product->stok) {
                $cart->update([
                    'qty' => $cart->qty + 1
                ]);
            }            
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $ProductID,
                'qty' => 1,
                'price' => $this->detailProduct->price,
            ]);
        }

        
        $this->dispatch('cartUpdated'); // Pancarkan event 'cartUpdated'
 
        
    }

    public function render()
    {
        // $ReviewProduct = Review::with(['user', 'product'])
        //     ->where('product_id', $this->detailProduct->id)->take(3)->get();
        // , compact('ReviewProduct')
        return view('livewire.pages.product-detail');
    }
}
