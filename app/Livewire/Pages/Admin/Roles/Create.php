<?php

namespace App\Livewire\Pages\Admin\Roles;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role as Roles;

class Create extends Component
{
    public $showModal = false;


    #[Validate(['required', 'min:3', 'max:50'])]
    public $name;

    
    public function modal_confirm() {
        $this->showModal = true;
    }


    public function store()
    {
        $this->validate();
        Roles::create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        $this->dispatch('role');
    }
    public function render()
    {
        return view('livewire.pages.admin.roles.create');
    }
}
