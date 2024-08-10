<?php

namespace App\Livewire\Pages\Admin\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Url;
use Mpdf\Mpdf;
use Illuminate\Database\Eloquent\Builder;


#[Layout('layouts.app')]
#[Title('Transactions')]
class TransactionList extends Component
{
    public $transactionTotal;

    #[Url()] 
    public ?string $search ='';

     public function exportPDF()
    {
        $transactions_PDF = Transaction::with(['product', 'user'])->get();
        $heads = ['No', 'Invoice', 'UserName', 'ProductName','transaction_total', 'qty', 'transaction_status', 'created_At'];

        $pdf = Pdf::loadView('PDF.transactions', compact('heads', 'transactions_PDF'))->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, 'transactions.pdf');
    }

    public function render()
    {
        $heads = ['No', 'Invoice', 'UserName', 'ProductName','transaction_total', 'qty', 'transaction_status', 'created_At'];
        $transactions = Transaction::with(['product', 'user', 'details'])
            ->whereHas('product', function (Builder $query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('user', function(Builder $query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('transaction_status', 'like', '%' . $this->search . '%')
            ->orWhere('invoice', 'like', '%' . $this->search . '%')
            ->paginate(10);
    
        $this->transactionTotal = $transactions->sum('transaction_total');

    
        return view('livewire.pages.admin.transaction.transaction-list', compact('heads', 'transactions'));
    }
}
