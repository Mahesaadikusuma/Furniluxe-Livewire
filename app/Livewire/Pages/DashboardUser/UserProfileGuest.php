<?php

namespace App\Livewire\Pages\DashboardUser;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
#[Title('User Profile')]
class UserProfileGuest extends Component
{
    use WithFileUploads;


    public User $user;
    
    public $name;
    public $email;
    public $photo;

    public string $path = 'public/profile-photos';

    public function mount()
    {
        $this->user = auth()->user();
        
        $this->email = $this->user->email;
        $this->name = $this->user->name;
    }

    protected function rules()
    {
        return [
            'name' => 'nullable|min:3|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $this->user->id,
            'photo' => 'nullable|image|mimes:jpg,png|max:3024',
        ];
    }

    protected $messages = [
        'required' => 'The :attribute field is required',
    ];

    public function updateProfileInformation()
    {
        $this->validate();

        if ($this->photo) {
            // Delete the old photo if it exists
            if ($this->user->profile_photo_path) {
                Storage::disk('local')->delete($this->user->profile_photo_path);
            }
            // Store the new photo
            $imagePath = $this->photo->storeAs($this->path, $this->photo->hashName(), );
        }

        $update = $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'profile_photo_path' => $imagePath ?? $this->user->profile_photo_path,
        ]);
        
        return $this->redirect('/dashboard/user/profile', navigate: true);
    }


    public function render()
    {
        return view('livewire.pages.dashboard-user.user-profile-guest');
    }
}
