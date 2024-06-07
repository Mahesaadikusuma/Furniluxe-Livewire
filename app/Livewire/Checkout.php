<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Checkout Product')]
#[Layout("layouts.main")]

class Checkout extends Component
{
    public $qty = 1;
    public $shipping = 15000;
    public $tax = 2000;
    public $price;
    public $total;

    public $product;

    public function render()
    {
        return view('livewire.checkout');
    }

    public function mount($slug)
    {
        $this->product = Product::with(['category'])->where('slug', $slug)->firstOrFail();
        $this->price = $this->product->price;
        $this->calculateTotal();
    }

    public function increment()
    {
        $this->qty++;
        $this->calculatePrice();
    }

    public function decrement()
    {
        if ($this->qty > 1) {
            $this->qty--;
            $this->calculatePrice();
        }
    }

    private function calculatePrice()
    {
        // Calculate the total price based on quantity and unit price
        $this->price = $this->product->price * $this->qty;
        $this->calculateTotal();
    }

    private function calculateTotal()
    {
        // Calculate the total amount including shipping and tax
        $this->total = $this->price + $this->shipping + $this->tax;
    }

    public function proses() {
        try {
            $user = Auth::user();
            $code = "FLX-" . rand(0000, 9999);

            $products = Product::findOrfail($this->product->id);

            if($this->qty < $products->stock  ) {
                throw new Exception('Stok Tidak Cukup');
            }

            DB::beginTransaction();

            $products->decrement('stok', $this->qty);
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'product_id' => $this->product->id,
                'transaction_total' => $this->total,
                'tax' => $this->tax,
                'transaction_status' => 'PENDING',
                'code' => $code,
                'qty' => $this->qty,
             ]);

             $detail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'resi' => '',
                'shipping' => 'PENDING' ,
                'estimated_delevery' => ''
            ]);

            // konfigurasi midtrans
            // \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
            // \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
            // \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
            // \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');
            // $midtrans = [
            //     'transaction_details' => [
            //         'order_id' => $code,
            //         'gross_amount' => (int) $this->total,
            //     ],
            //     'item_details' => [
            //     [
            //         'id' => $this->product->id,
            //         'price' => (int) $this->total,
            //         'quantity' => (int) $this->qty,
            //         'name' => $this->product->name,
            //         'brand' => 'Midtrans',
            //         'category' => $this->product->category->name,                   
            //         ],
            //     ],
                
            //     'customer_details' => [
            //         'first_name' => $user->name,
            //         'email' => $user->email,
            //     ],
            //     // 'enabled_payments' => [
            //     //     'gopay', 'permata_va', 'bank_transfer'
            //     // ],
            //     'vtweb'=> [],
            // ];

            // try {
            // // Get Snap Payment Page URL
            // $paymentUrl = \Midtrans\Snap::createTransaction($midtrans)->redirect_url;
            
            // // Redirect to Snap Payment Page
            // return redirect($paymentUrl);
            // }
            // catch (Exception $e) {
            //     return redirect()->back()->withErrors($e->getMessage());

            // }

            DB::commit();


            return redirect()->to('/success');
        } catch (Exception $e) {
                DB::rollBack();

            return redirect()->back()->withErrors($e->getMessage());
        }

    }
}
