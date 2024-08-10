<?php

namespace App\Livewire\Pages\Admin\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Delete extends Component
{
    public $showModal = false;
    public Permission $permission;

    public function delete_confirm() {
        $this->showModal = true;
    }

    public function mount()
    {
        $this->permission->name;
    }

    public function delete()
    {
        $id = $this->permission->id;
        $Role = Permission::findOrFail($id);
        $Role->delete();
        $this->dispatch('permissions');   
    }
    public function render()
    {
        return view('livewire.pages.admin.permission.delete');
    }
}
