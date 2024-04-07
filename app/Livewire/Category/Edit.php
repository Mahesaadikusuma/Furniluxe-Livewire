<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public $category;
    public $deleteId;
    public $showModal = false;

    public function mount(Category $category) {
        $this->category = $category;
    }
    
    public function delete_confirm($id)
    {
        $this->showModal = true;
        $this->deleteId = $id;
        // dd($this->deleteId);
        // dd($this->confirmModal);
    }

    public function delete() {
        
        
        // dd($this->deleteId);
        $category = Category::findOrFail($this->deleteId);
        
        $category->delete();
        $this->showModal = false;
        $this->dispatch('updateCategory');

        // return redirect()->route('dashboard');
    } 

    public function render()
    {
        return view('livewire.category.edit');
    }
}
