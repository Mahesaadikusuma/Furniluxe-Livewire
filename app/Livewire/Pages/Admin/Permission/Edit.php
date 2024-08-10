<?php

namespace App\Livewire\Pages\Admin\Permission;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public $showModal = false;

    #[Validate(['required', 'min:3', 'max:50'])]
    public $name;

    public Permission $permission;

    public function modal_confirm() {
        $this->showModal = true;
    }

    public function mount()
    {
        $this->name = $this->permission->name;
    }

    public function update()  {
        $this->validate();

        $id = $this->permission->id;
        $roles = Permission::findOrFail($id);

        $roles->update([
            'name' => $this->name,
        ]);

        // $this->dispatch('permissions');   
        return $this->redirect('/Admin/permissions', navigate:true);
    }
    public function render()
    {
        return view('livewire.pages.admin.permission.edit');
    }
}
