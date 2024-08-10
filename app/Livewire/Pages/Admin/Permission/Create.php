<?php

namespace App\Livewire\Pages\Admin\Permission;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

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
        Permission::create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        $this->dispatch('permissions');
    }
    public function render()
    {
        return view('livewire.pages.admin.permission.create');
    }
}
