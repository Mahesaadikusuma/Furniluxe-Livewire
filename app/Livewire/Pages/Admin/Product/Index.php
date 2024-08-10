<?php

namespace App\Livewire\Pages\Admin\Product;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\Attributes\Session;

#[Layout('layouts.app')]
#[Title('Product')]
class Index extends Component
{
    use WithPagination;


    #[Url()]
    // #[Session()]
    public $search;

    protected function products()
    {
        return Product::with('category')
            ->whereHas('category', function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(7);
    }

    public function render()
    {
        $heads = ['No','Name','Category',  'Slug','Description', 'Image', 'Stock', 'Price'];
        

        

       
            
        return view('livewire.pages.admin.product.index',[
            'heads' => $heads,
            'products' => $this->products(),
        ]);
    }
}
