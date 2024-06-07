<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;


#[Title('CategoryList')]
#[Layout("layouts.main")]

class CategoryList extends Component
{
    
    public Category $category;

    #[Url()]
    public $search = '';
    
    protected $listeners = ['updateCategory' => '$refresh'];


    
    public function removeTMP(){
        $oldFile = Storage::files('livewire-tmp');

        foreach ($oldFile as $file) {
            Storage::delete($file);
        }
        session()->flash('success', 'File livewire-tmp Deleted');
        return redirect()->route('categories');
    }    


    #[On('updateCategory')] 
    
    
    public function render()
    {   
        // orderBy('id', 'desc')->
        // users' => User::search($this->search)->get(),
        $categories = Category::orderBy('id', 'desc')->get();
        return view('livewire.category.category-list',[
            // 'categories' => $categories
            'categories' => Category::where('name', 'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }
}
