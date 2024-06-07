<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TransactionEdit extends Component
{   
    public $transaction;
    public $showModal = false;

    #[Validate("required|in:SUCCESS,FAILED,PENDING")]
    public $transactionShipping;

    public $username;
    public $product;
    
    public $transactionDetail;

    #[Validate("required|in:SUCCESS,FAILED,PENDING")]
    public $transaction_status;

    
        
    public function mount(Transaction $transaction)
    {        
        $this->transaction = $transaction;
        $this->username = $transaction->user;

        $this->transaction_status = $transaction->transaction_status;
        $this->transactionShipping = $transaction->detail->shipping;

        // dd($this->transaction);
    }


    public function modal_confirm($id){
        $this->showModal = true;
        $this->transaction->id = $id;
    }

    public function update()
    {
        $this->validate();
        $id = $this->transaction->id;
        $transactions = Transaction::FindOrFail($id);
        $transactions->update([
            'transaction_status' => $this->transaction_status
        ]);

        $transactions->detail->update([
            'shipping' => $this->transactionShipping
        ]);

        
        return redirect()->route('transaction');
    }


    // public function update()
    // {
    //     dd('adasdas');
    // }
    public function render()
    {
        return view('livewire.transaction.transaction-edit');
    }
}
