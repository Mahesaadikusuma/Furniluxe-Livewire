<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


#[On('itemDeleted')]
class Edit extends Component
{
    use WithFileUploads;
   

    public Category $category;

    #[Validate("required|string|min:3")]
    public $name = '';

    #[Validate("nullable|image|mimes:jpg,png")]
    public $thumbnail = null;
    public $deleteId;
    public $showModal = false;


     public function mount(Category $category) {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function edit_confirm($id) {
        $this->showModal = true;
        $this->deleteId = $id;
    }


    public function update() {
        $this->validate();

        $categories = Category::findOrFail($this->deleteId);
        if ($this->thumbnail) {

            if ($categories->thumbnail) {
                Storage::disk('local')->delete('public/' . $categories->thumbnail);
            }

            $namePath  = $this->thumbnail->hashName();
            $path = $this->thumbnail->storeAs("image", $namePath, "public");
        }
        
        $categories->update([
            'name' => $this->name,
            'thumbnail' => $path ?? $this->category->thumbnail
        ]);
        
        // $this->dispatch('updateCategory');
        
        return redirect()->route('categories');
    }
    
    
    public function render()
    {
        return view('livewire.category.edit');
    }
}
