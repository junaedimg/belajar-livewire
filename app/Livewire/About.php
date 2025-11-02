<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\Attributes\Title;

#[Title('About')]
class About extends Component
{
    public function render()
    {
        return <<<'HTML'
            <div class="text-center mt-30">
                <h1 class="text-3xl font-semibold">Home Page</h1>
            </div>
        HTML;
    }
}
