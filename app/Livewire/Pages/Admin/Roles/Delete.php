<?php

namespace App\Livewire\Pages\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role as Roles;

class Delete extends Component
{

    public $showModal = false;
    public Roles $role;

    public function delete_confirm() {
        $this->showModal = true;
    }

    public function mount()
    {
        $this->role->name;
    }

    public function delete()
    {
        $id = $this->role->id;
        $Role = Roles::findOrFail($id);
        $Role->delete();
        $this->dispatch('role');   
    }

    public function render()
    {
        return view('livewire.pages.admin.roles.delete');
    }
}
