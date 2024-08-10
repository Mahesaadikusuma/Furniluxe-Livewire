<?php

namespace App\Livewire\Pages\Admin\Roles;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role as Roles;

#[Layout('layouts.app')]
#[Title('Roles Edit')]
class Edit extends Component
{
    public $showModal = false;

    #[Validate(['required', 'min:3', 'max:50'])]
    public $name;

    public Roles $role;

    public function modal_confirm() {
        $this->showModal = true;
    }

    public function mount()
    {
        $this->name = $this->role->name;
    }

    public function update()  {
        $this->validate();

        $id = $this->role->id;
        $roles = Roles::findOrFail($id);

        $roles->update([
            'name' => $this->name,
        ]);

        // $this->dispatch('role');
        return $this->redirect('/Admin/roles', navigate:true);
    }

    public function render()
    {
        return view('livewire.pages.admin.roles.edit');
    }
}
