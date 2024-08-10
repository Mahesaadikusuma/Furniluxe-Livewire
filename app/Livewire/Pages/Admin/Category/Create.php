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
#[Title('Categories Create')]
class Create extends Component
{
    use WithFileUploads;

    public $showModal = false;

    #[Validate('required|string|min:3|max:100', message: 'name category harus di isi')]
    public $name;

    #[Validate('required|image|mimes:jpg,png|max:2048', message: 'thumbnail harus di isi')]
    public $thumbnail;

    public $path = 'public/categories';


     public function modal_confirm() {
        $this->showModal = true;
        
    }

    public function removeTMP(){
        $oldFile = Storage::files('livewire-tmp');

        foreach ($oldFile as $file) {
            Storage::delete($file);
        }
        session()->flash('success', 'File livewire-tmp Deleted');
        return $this->redirect('/Admin/categories', navigate:true);
    }    

    public function store(){
        $this->validate();
        $imagePath = $this->thumbnail->storeAs(path: $this->path, name: $this->thumbnail->hashName());

        $category = Category::create([
            'name' => $this->name,
            'thumbnail' => $imagePath
        ]);
        $this->reset('name', 'thumbnail');
        $this->dispatch('categorySaved');
        // return redirect()->route('categories.index', navigate:true);
        // return $this->redirect('/Admin/categories', navigate:true);
    }
    public function render()
    {
        $this->authorize('manage tasks');
        return view('livewire.pages.admin.category.create');
    }
}
