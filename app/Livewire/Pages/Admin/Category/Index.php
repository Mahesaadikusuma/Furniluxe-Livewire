<?php

namespace App\Livewire\Pages\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Categories')]

class Index extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = '';

    #[On('categorySaved')]
    public function refreshCategories()
    {
        $this->render();
    }


    public function render()
    {
        $heads = ['No','Name', 'Slug', 'Thumbnail'];
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        // $categories = Category::select(['id', 'name', 'slug', 'thumbnail'])
        //     ->where('name', 'like', '%' . $this->search . '%')
        //     ->latest()
        //     ->paginate(10);


        return view('livewire.pages.admin.category.index', compact('heads', 'categories'));
    }
}
