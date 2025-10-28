<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class Users extends Component
{

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:3')]
    public $password = '';

    public function createNewUser()
    {

        // ! CARA Liverwire
        // $validated = $this->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:3'
        // ]);

        // User::Create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => Hash::make($validated['password'])
        // ]);

        $this->validate();

        User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);



        // $this->reset(['name','email','password']);
        $this->reset();

        session()->flash('success', 'User created.');
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Title page',
            'users' => User::all()
        ]);
    }
}
