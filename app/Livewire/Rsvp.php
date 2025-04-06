<?php

namespace App\Livewire;

use App\Models\Rsvp as RsvpModel;
use Livewire\Component;

class Rsvp extends Component
{
    public RsvpModel $rsvp;

    public function mount(RsvpModel $rsvp): void
    {
        $this->rsvp = $rsvp;
    }

    public function render()
    {
        return view('livewire.rsvp');
    }
}
