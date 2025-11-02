<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{

    use WithFileUploads, WithPagination;

    public $query = '';

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:3')]
    public $password = '';

    #[Validate('image|max:5000')]
    public $avatar = null;


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
    }

    public function render()
    {
        // dump($this->query);
        return view('livewire.users', [
            'title' => 'Title page',
            'users' => User::latest()
                ->where('name', 'like', "%{$this->query}%")
                ->paginate(6)
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    // Computed Properties
    public function updatedQuery()
    {
        $this->resetPage();
    }
}
