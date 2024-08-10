<?php

namespace App\Livewire\Pages\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;


use Livewire\Component;


class Delete extends Component
{
    public Category $category;
    public $showModal = false;


    public function mount()
    {
        $this->category->name;
    }


    public function delete_confirm() {
        $this->showModal = true;
    }

    public function delete()
    {
        $id = $this->category->id;
        $categories = Category::findOrFail($id);

        if ($categories->thumbnail) {
            Storage::disk('local')->delete($categories->thumbnail);
        }

        $categories->delete();

        
        $this->dispatch('categorySaved');
        // return $this->redirect()->route('categories.index', navigate:true);
        // return $this->redirect('/Admin/categories', navigate:true);
    }

    public function render()
    {
        return view('livewire.pages.admin.category.delete');
    }
}
