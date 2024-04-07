<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoryList extends Component
{
    
    public function delete($id)
    {
        $category = Category::find($id);
        // $this->authorize('delete', $category); // ini seperti role ketika rolenya harus untuk menghapus maka bisa selain itu tidak akan bisa di hapus
        $category->delete();
    }


    public function removeTMP(){
        $oldFile = Storage::files('livewire-tmp');

        foreach ($oldFile as $file) {
            Storage::delete($file);
        }
        session()->flash('success', 'File livewire-tmp Deleted');
        return redirect()->route('dashboard');
    }


    #[On('updateCategory')]
    public function render()
    {
        // $category = Category::all();
        return view('livewire.category.category-list', [
            'category' => Category::orderBy('id', 'desc')->get()
        ]);
    }
}
