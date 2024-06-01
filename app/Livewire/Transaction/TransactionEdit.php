<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Component;

class TransactionEdit extends Component
{   
    public $transaction;

    public $showModal = false;

    public $username;
    public $product;
    public $transactionDetail;
    public function mount(Transaction $transaction)
    {
        
        $this->transaction = $transaction;
        $this->username = $transaction->user;
        
        
    }


    public function modal_confirm($id){
        $this->showModal = true;
        $this->transaction->id = $id;
    }
    public function render()
    {
        return view('livewire.transaction.transaction-edit');
    }
}
