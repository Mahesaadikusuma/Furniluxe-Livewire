<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard Transaction')]
class TransactionList extends Component
{
    public function render()
    {

        $transaction = Transaction::with(['product', 'user', 'detail'])->paginate(10);

        return view('livewire.transaction.transaction-list',compact('transaction'));
    }
}
