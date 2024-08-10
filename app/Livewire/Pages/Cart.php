<?php

namespace App\Livewire\Pages;

use Exception;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use App\Models\Cart as Carts;
use App\Models\DetailTransaction;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.main')]
#[Title('Cart')]
class Cart extends Component
{
    public $CartList = [];
    public $tax = 2000;
    public $Price = 0;
    public $shipping = 5000;
    public $total = 0;

    #[On('cartUpdated')]
    public function refreshCart()
    {
        $this->UserCart();
        $this->calculatePrice();
    }

    public function mount()
    {
        $this->refreshCart();
    }

    public function checkout()
    {
        try {
            $user = Auth::user(); 
            $carts = Carts::where('user_id', $user->id)->firstOrFail();
            $invoice = "FLX-" . rand(0000, 9999);

            DB::beginTransaction();

            foreach ($this->CartList as $cart ) {
                $transaction = Transaction::create([
                    'user_id' => $cart->user_id,
                    'product_id' => $cart->product_id,
                    'transaction_total' => $this->total,
                    'tax' => $this->tax,
                    'transaction_status' => 'PENDING',
                    'invoice' => $invoice,
                    'qty' => $cart->qty,
                ]);


                $detail = DetailTransaction::create([
                    'transaction_id' => $transaction->id,
                    
                    'resi' => '',
                    'shipping' => 'PENDING',
                ]);

                $cart->product->decrement('stok', $cart->qty);
                $cart->delete();
            }

            DB::commit();

            return $this->redirect('/success', navigate:true);
        } catch (Exception $e) {
            DB::rollBack();
            // Log the error message for debugging
            Log::error('Checkout error: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }




    public function decrement($id)
    {
        $cart = Carts::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();

        if ($cart->qty > 1) {
            $cart->decrement('qty');
            $this->dispatch('cartUpdated');
        }
    }

    public function increment($id)
    {
        $cart = Carts::where('id', $id)->where('user_id', Auth::user()->id)->firstOrFail();
        if ($cart->qty < $cart->product->stok) {
            $cart->increment('qty');
            $this->dispatch('cartUpdated');
        }
    }

    public function calculatePrice()
    {
        $this->Price = 0; // Reset total price
        foreach ($this->CartList as $cart) {
            $this->Price += $cart->product->price * $cart->qty;
        }

        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $this->total = $this->Price + $this->shipping + $this->tax;
    }

    public function UserCart()
    {
        $this->CartList = Carts::with(['product', 'user'])->where('user_id', Auth::user()->id)->get();
    }

    public function removeCart($id)
    {
        Carts::find($id)->delete();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.pages.cart');
    }
}
