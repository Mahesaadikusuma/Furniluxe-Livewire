<?php

namespace App\Livewire\Pages\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Categories Edit')]

class Edit extends Component
{
    use WithFileUploads;

    public $showModal = false;

    #[Validate('required|string|min:3|max:100', message: 'name category harus di isi')]
    public $name;

    #[Validate('nullable|image', message: 'thumbnail harus di isi')]
    public $thumbnail;

    public $path = 'public/categories';
    public Category $category;

    
    public function modal_confirm() {
        $this->showModal = true;
    }


    public function mount()
    {   
        $this->name = $this->category->name;

    }

    public function update() 
    {
        $this->validate();


        $id = $this->category->id;
        $categoryUpdate = Category::findOrFail($id);

        if ($this->thumbnail) {
            Storage::disk('local')->delete($categoryUpdate->thumbnail);
            
            $imagePath = $this->thumbnail->storeAs(path: $this->path, name: $this->thumbnail->hashName());
            // $this->image->storeAS(path: $this->path, name: $this->image->hashName());
            $categoryUpdate->update([
                'name' => $this->name,
                'thumbnail' => $imagePath
            ]);

        } else {
            $categoryUpdate->update([
                'name' => $this->name
            ]);
        }

        
        $this->dispatch('categorySaved');
        // return $this->redirect('/Admin/categories', navigate:true);
    }

    public function render()
    {
        return view('livewire.pages.admin.category.edit');
    }
}
