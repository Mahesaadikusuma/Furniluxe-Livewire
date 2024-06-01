<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
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
        
    //   dd($category->thumbnail);
       
        if ($category->thumbnail) {
            Storage::disk('local')->delete('public/' . $category->thumbnail);
        }
        
        $category->delete();
        $this->showModal = false;
        $this->dispatch('itemDeleted');

        // return redirect()->route('category');
    } 
    public function render()
    {
        return view('livewire.category.delete');
    }
}
