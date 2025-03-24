<?php

namespace App\Livewire;

use Livewire\Component;

class Venue extends Component
{
    public function render()
    {
        sleep(1);
        return view('livewire.venue');
    }
}
