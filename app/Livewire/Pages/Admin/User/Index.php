<?php

namespace App\Livewire\Pages\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Layout('layouts.app')]
#[Title('Users')]
class Index extends Component
{
    #[On('roleUpdated')]
    public function render()
    {
        $heads = ['No','Name', 'Email', 'role'];
        $auth = auth()->user();
        $auth->hasAllRoles(Role::all());

        $users = User::all();
        
        return view('livewire.pages.admin.user.index', compact('auth', 'heads', 'users'));
    }
}
