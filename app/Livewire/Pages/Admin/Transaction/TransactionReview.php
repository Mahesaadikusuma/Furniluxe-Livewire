<?php

namespace App\Livewire\Pages\Admin\Transaction;

use App\Models\Review;
use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;


#[Layout('layouts.app')]
#[Title('Transactions')]
class TransactionReview extends Component
{

    public Transaction $transaction;

    #[Validate('required|string|min:3|max:100')]
    public $review;


    public $showModal = false;
    public function modal_confirm()
    {
        $this->showModal = true;
    }

    public function mount()
    {
        $this->review = $this->transaction->details->review;
    }


    public function store()
    {
        $this->validate();

        $reviewProduct = Review::create([
            'user_id' => $this->transaction->user_id,
            'product_id' => $this->transaction->product_id,
            'comment' => $this->review,
        ]);
        

        $transactions = $this->transaction->details->update([
            'review_id' => $reviewProduct->id
        ]);


        session()->flash('status', 'Review successfully Created.');
        return $this->redirect('/Admin/transactions', navigate: true);

    }


    public function render()
    {
        return view('livewire.pages.admin.transaction.transaction-review');
    }
}
