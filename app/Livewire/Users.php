<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    // public $title = 'Users Page';

    public function createUser()
    {
        User::Create([
            'name' => 'edi',
            'email' => 'test@gmail.com',
            'password' => '123'
        ]);
    }

    public function render()
    {
        return view('livewire.users', [
            'title' => 'Title page',
            'users' => User::all()
        ]);
    }
}
