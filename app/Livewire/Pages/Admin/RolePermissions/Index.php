<?php

namespace App\Livewire\Pages\Admin\RolePermissions;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

#[Layout('layouts.app')]
#[Title('Products')]
class Index extends Component
{
    public function render()
    {
        $heads = ['No','Name', 'Email', 'role'];

        // $auth = auth()->user();
        // $auth->hasAllRoles(Role::all());
        $roles = Role::with('permissions')->get();
        $permission = Permission::all();
        // $users = User::all();
        
        
        return view('livewire.pages.admin.role-permissions.index', compact('roles', 'heads', 'permission'));
    }
}
