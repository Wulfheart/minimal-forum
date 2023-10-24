<?php

namespace App\Livewire;

use Livewire\Component;

class Two extends Component
{
    public function mount(): void
    {
        sleep(5);
    }

    public function render()
    {
        return view('livewire.two');
    }
}
