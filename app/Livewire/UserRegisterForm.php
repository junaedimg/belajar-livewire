<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;


class UserRegisterForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:3')]
    public $password = '';

    #[Validate('image|max:5000')]
    public $avatar = null;

    public function render()
    {
        return view('livewire.user-register-form');
    }


    public function createNewUser()
    {

        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);



        // $this->reset(['name','email','password']);
        $this->reset();

        session()->flash('success', 'User created.');

        $this->dispatch('user-created');
    }
}
