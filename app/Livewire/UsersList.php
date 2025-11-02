<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class UsersList extends Component
{

    use WithPagination;


    public $query = '';



    public function search()
    {
        $this->resetPage();
    }

    // Computed Properties
    #[On('user-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }


    #[Computed]
    public function users()
    {
        return User::latest()
            ->where('name', 'like', "%{$this->query}%")
            ->paginate(6);
    }

    public function placeholder()
    {
        return view('livewire.placeholders.skeleton');
    }


    // ! bisa tanpa render jika ingin default viewnya.
    // public function render()
    // {
    //     return view('livewire.users-list', [
    //         'users' => $this->user
    //     ]);
    // }
}
