<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\ContactForm;

class Contacts extends Component
{

    public ContactForm $form;

    public function createNewMessage()
    {
        // ! semua form pada method
        // $this->validate();

        // ! per form
        // $this->$form->validate();

        // Contact::create($this->form->all());

        $this->form->store();

        $this->reset();

        session()->flash('success', 'message has been sent.');
    }

    public function render()
    {
        return view('livewire.contacts');
    }
}
