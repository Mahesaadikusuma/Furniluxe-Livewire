<?php

namespace App\Livewire\Pages\DashboardUser;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.app')]
#[Title('History Transaction')]
class HistoryTransaction extends Component
{
    public function render()
    {
        $heads = ['No', 'Invoice', 'UserName', 'ProductName', 'Harga Satuan' ,'transaction_total', 'qty', 'transaction_status', 'created_At'];
        $transactions = Transaction::with(['product', 'details', 'user'])->where('user_id', Auth::user()->id)
            ->latest()->paginate(10);
        return view('livewire.pages.dashboard-user.history-transaction', compact('heads', 'transactions'));
    }
}
