<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Dashboard Admin')]
class DashboardAdmin extends Component
{
    public function render()
    {
        $popularProducts = Transaction::with(['product'])
                ->select('product_id', DB::raw('SUM(qty) as total_qty'))
                ->where('transaction_status', 'SUCCESS')// Jika ingin menghitung hanya transaksi yang selesai
                ->groupBy('product_id')
                ->orderBy('total_qty', 'desc')
                ->take(10) // Mengambil 10 produk paling populer
                ->get();

        $popularProductsDetails = Product::whereIn('id', $popularProducts->pluck('product_id'))
            ->get();

            
        return view('livewire.pages.admin.dashboard-admin', compact('popularProducts', 'popularProductsDetails'));
    }
}
