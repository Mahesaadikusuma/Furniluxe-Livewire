<?php

namespace App\Livewire\Pages\Admin\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Transaction Edit')]
class TransactionEdit extends Component
{
    public Transaction $transaction;

    public $showModal = false;

    
    #[Validate('required|in:SUCCESS,PENDING,FAILED')]
    public $transaction_status;

    #[Validate('nullable|min:3|max:255')]
    public $resi;

    public function mount(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->transaction_status = $this->transaction->transaction_status;
        $this->resi = $this->transaction->detail->resi ?? '';
    }

    public function modal_confirm()
    {
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $transaction = $this->transaction->update([
            'transaction_status' => $this->transaction_status
        ]);

        $this->transaction->details->update([
            'shipping' => $this->transaction_status,
            'resi' => $this->resi,
        ]);

        
        session()->flash('status', 'Transaction Status successfully updated.');
        return $this->redirect('/Admin/transactions', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.admin.transaction.transaction-edit');
    }
}
