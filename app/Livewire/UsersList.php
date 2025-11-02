<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
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

    public function render()
    {
        // dump($this->query);
        return view('livewire.users-list', [
            'title' => 'Title page',
            'users' => User::latest()
                ->where('name', 'like', "%{$this->query}%")
                ->paginate(6)
        ]);
    }
}
