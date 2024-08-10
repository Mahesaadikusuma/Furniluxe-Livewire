<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Checkout Product')]
#[Layout("layouts.main")]
class Checkout extends Component
{
    public $qty = 1;
    public $shipping = 5000;
    public $tax = 2000;
    public $price;
    public $total;
    public $product;
    public $showError = false;

    public function render()
    {
        return view('livewire.pages.checkout');
    }

    public function mount($slug)
    {
        $this->product = Product::with(['category'])->where('slug', $slug)->firstOrFail();
        $this->price = $this->product->price;
        $this->calculateTotal();
    }

    public function increment()
    {
        if ($this->qty < $this->product->stok) {
            $this->qty++;
            $this->calculatePrice();
            $this->showError = false; // Reset error state
        } else {
            session()->flash('error', 'Jumlah produk yang diminta melebihi stok yang tersedia.');
            $this->showError = true; // Tampilkan error state
        }
    }

    public function decrement()
    {
        if ($this->qty > 1) {
            $this->qty--;
            $this->calculatePrice();
            $this->showError = false; // Reset error state
        }
    }

    private function calculatePrice()
    {
        $this->price = $this->product->price * $this->qty;
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        $this->total = $this->price + $this->shipping + $this->tax;
    }

    public function proses()
    {
        Log::info('Memulai fungsi proses');
        try {
            $user = Auth::user();
            $invoice = "FLX-" . rand(0000, 9999);

            $products = Product::findOrFail($this->product->id);
            
          
            DB::beginTransaction();

            $products->decrement('stok', $this->qty);
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'product_id' => $this->product->id,
                'transaction_total' => $this->total,
                'tax' => $this->tax,
                'transaction_status' => 'PENDING',
                'invoice' => $invoice,
                'qty' => $this->qty,
            ]);
            
            $detail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'shipping' => 'PENDING',
                'resi' => '',
            ]);
            
            $midtrans = [
                'transaction_details' => [
                    'order_id' => $invoice,
                    'gross_amount' => (int) $this->total,
                ],
                'item_details' => [
                [
                    'id' => $this->product->id,
                    'price' => (int) $this->total,
                    'quantity' => (int) $this->qty,
                    'name' => $this->product->name,
                    'brand' => 'Midtrans',
                    'category' => $this->product->category->name,                   
                    ],
                ],
                
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ],
                // 'enabled_payments' => [
                //     'gopay', 'permata_va', 'bank_transfer'
                // ],
                'vtweb'=> [],
            ];

            try {
            // Get Snap Payment Page URL
            // $snapToken = \Midtrans\Snap::getSnapToken($midtrans);
            $paymentUrl = \Midtrans\Snap::createTransaction($midtrans)->redirect_url;
            
            DB::commit();
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            }
            catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors($e->getMessage());
            }

            // dd($detail);
            
            // DB::commit();

            // return redirect()->to('/success');
            return $this->redirect('/success', navigate:true);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}

