<?php

namespace App\Livewire\Pages\Admin\Roles;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role as Roles;

#[Layout('layouts.app')]
#[Title('Roles')]
class Index extends Component
{
    #[On('role')]
    
    public function render()
    {
        $heads = ['No','Name'];
        $roles = Roles::all();
        return view('livewire.pages.admin.roles.index', compact('heads', 'roles'));
    }
}
