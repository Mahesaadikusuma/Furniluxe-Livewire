<?php

namespace App\Livewire\Pages\Admin\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public User $user;

    public $showModal = false;
    public $name;
    public $roles;
    public $rolesSelected = [];

    protected $rules = [
        'name' => 'required|string|min:3|max:100',
        'rolesSelected' => 'array',
        'rolesSelected.*' => 'exists:roles,id',
    ];

    protected $messages = [
        'name.required' => 'Nama User harus diisi',
        'name.string' => 'Nama User harus berupa string',
        'name.min' => 'Nama User harus minimal 3 karakter',
        'name.max' => 'Nama User maksimal 100 karakter',
        'rolesSelected.array' => 'Roles harus berupa array',
        'rolesSelected.*.exists' => 'Role yang dipilih tidak valid',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $this->user->name;
        $this->roles = Role::all();
        $this->rolesSelected = $this->user->roles->pluck('id')->toArray();
    }

    public function modal_confirm()
    {
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        // Fetch the roles by IDs
        $roles = Role::whereIn('id', $this->rolesSelected)->get();

        // Sync roles using the role instances
        $this->user->syncRoles($roles);

        // Optionally, you can flash a session message
        session()->flash('success', 'User role updated successfully.');

        // Close the modal
        $this->showModal = false;

        // Optionally, refresh the page or emit an event to update the parent component
        $this->dispatch('roleUpdated');
    }

    public function render()
    {
        return view('livewire.pages.admin.user.edit');
    }
}
