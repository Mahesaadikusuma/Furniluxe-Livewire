<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Validate("required|string|min:3")]
    public $name = '';

    #[Validate("nullable|image|mimes:jpg,png")]
    public $thumbnail = null;
    public $loadingSave = true;

    public function store()
    {   
        $this->validate();
        // $validated = $this->validate();

        // getClientOriginalName    
        // hashName
        // if ($this->thumbnail) {
        //     $this->thumbnail->store('categories', 'public');
        // } 


        if ($this->thumbnail) {
            $namePath  = $this->thumbnail->hashName();
            $path = $this->thumbnail->storeAs("image", $namePath, "public");
        }
        // Category::create(
        //     $this->only(['name', 'thumbnail'])
            // $this->all()
        // );
        $category = Category::create([
            'name' => $this->name,
            'thumbnail' => $this->thumbnail ? $path : null,
        ]);
        // Category::create($validated);

        $this->reset('name', 'thumbnail');
        session()->flash('success', 'Category created successfully');

         
        return redirect()->route('categories');
        // return redirect()->to('/categories');
    
    }

     public function remove() {
        $this->loadingSave = false;
    }
    public function render()
    {
        return view('livewire.category.create');
    }
}
