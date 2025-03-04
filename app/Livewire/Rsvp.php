<?php

namespace App\Livewire;

use App\Models\Rsvp as RsvpModel;
use Livewire\Component;

class Rsvp extends Component
{
    public ?bool $attending = null;
    public ?bool $has_dietary_requirements = null;
    public bool $helen = false;
    public bool $ryan = false;
    public bool $ada = false;
    public RsvpModel $rsvp;
    public $attending_guests = [];

    public function mount(RsvpModel $rsvp): void
    {
        $this->rsvp = $rsvp;
    }

    public function setAttending(bool $attending): void
    {
        $this->attending = $attending;
    }

    public function setHasDietaryRequirements(bool $has_dietary_requirements): void
    {
        $this->has_dietary_requirements = $has_dietary_requirements;
    }

    public function render()
    {
        return view('livewire.rsvp');
    }
}
