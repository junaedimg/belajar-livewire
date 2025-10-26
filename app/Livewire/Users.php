<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    public function createNewUser()
    {
        User::Create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        // $this->reset(['name','email','password']);
        $this->reset();

    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Title page',
            'users' => User::all()
        ]);
    }
}
