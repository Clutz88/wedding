<?php

namespace App\Livewire;

use App\Models\Guest;
use App\Models\Rsvp as RsvpModel;
use Livewire\Component;

class Rsvp extends Component
{
    public ?bool $attending = null;

    public ?bool $has_dietary_requirements = null;

    public bool $overview = false;

    public RsvpModel $rsvp;

    public array $attending_guests = [];
    public array $dietary_requirements = [];

    public function mount(RsvpModel $rsvp): void
    {
        $this->rsvp = $rsvp;
    }

    public function getGuest(string $id): Guest
    {
        return $this->guests->where('id', $id)->first();
    }

    public function setOverview(bool $overview): void
    {
        $this->overview = $overview;
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
        return $this->overview ? view('livewire.rsvp.overview') : view('livewire.rsvp');
    }
}
