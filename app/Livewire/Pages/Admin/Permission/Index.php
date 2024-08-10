<?php

namespace App\Livewire\Pages\Admin\Permission;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

#[Layout('layouts.app')]
#[Title('Permissions')]
class Index extends Component
{
    #[On('permissions')]
    public function render()
    {
        $heads = ['No','Name'];
        $permission = Permission::all();
        return view('livewire.pages.admin.permission.index', compact('heads', 'permission'));
    }
}
