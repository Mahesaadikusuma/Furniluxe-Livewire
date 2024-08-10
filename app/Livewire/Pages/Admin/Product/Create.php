<?php

namespace App\Livewire\Pages\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $path = 'public/products';


    #[Validate("required|exists:categories,id")]
    public $category_id;

    #[Validate("required|string|min:3|max:100")]
    public $name = '';

    #[Validate("required|image|mimes:jpeg,png,jpg|max:3048")]
    public $image;

    #[Validate("required|string|min:5")]
    public $description;

    #[Validate("required|integer")]
    public $price;

    #[Validate("required|integer")]
    public $stok;


    public $category;
     public function modal_confirm() {
        $this->showModal = true;
    }

    public function removeTMP(){
        $oldFile = Storage::files('livewire-tmp');

        foreach ($oldFile as $file) {
            Storage::delete($file);
        }
        session()->flash('success', 'File livewire-tmp Deleted');
        return $this->redirect('/Admin/product', navigate:true);
    }    


    public function mount()
    {
        $this->category = Category::all();
    }

     public function store()
    {
        $this->validate();
        $imagePath = $this->image->storeAs(path: $this->path, name: $this->image->hashName());

        $product = Product::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $imagePath,
            'price' => $this->price,
            'stok' => $this->stok,
        ]);

        
        $this->reset('name', 'description', 'image', 'price', 'stok','category_id');
        session()->flash('success', 'product created successfully');
        // $this->dispatch('updateProduct');

        return $this->redirect('/Admin/product', navigate:true);
    }


    public function render()
    {
        // $category = Category::all();
        return view('livewire.pages.admin.product.create');
    }
}
