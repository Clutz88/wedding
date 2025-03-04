<?php

namespace App\Livewire;

use Livewire\Component;

class Itinerary extends Component
{
    public function render()
    {
        return view('livewire.itinerary', [
            'itineraries' => \App\Models\Itinerary::all(),
        ]);
    }
}
