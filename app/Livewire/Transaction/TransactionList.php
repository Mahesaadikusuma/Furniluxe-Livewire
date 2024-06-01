<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class TransactionList extends Component
{
    public function render()
    {

        $transaction = Transaction::with(['product', 'user', 'transactionDetail'])->get();

        return view('livewire.transaction.transaction-list',compact('transaction'));
    }
}
