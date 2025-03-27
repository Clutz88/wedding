<?php

namespace App\Livewire;

use App\Enums\RsvpStage;
use App\Models\Guest;
use App\Models\Rsvp as RsvpModel;
use Illuminate\Support\Collection;
use Livewire\Component;

class RsvpForm extends Component
{
    public ?bool $attending = null;

    public ?bool $has_dietary_requirements = null;

    public bool $overview = false;

    public string $stage;

    public RsvpModel $rsvp;

    public array $attending_guests = [];
    public Collection $dietary_requirements;

    public function mount(RsvpModel $rsvp): void
    {
        $this->rsvp = $rsvp;
        $this->dietary_requirements = collect();
        $this->stage = RsvpStage::FORM->value;
    }

    public function setStage(RsvpStage $stage): void
    {
        $this->stage = $stage->value;
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

    public function getDietaryRequirements(string $id): string
    {
        return collect($this->dietary_requirements[$id] ?? [])
            ->filter(fn ($value) => $value !== true)
            ->implode(fn ($value) => $value, ', ');
    }

    public function confirm()
    {

    }

    public function render()
    {
        return view('livewire.rsvp.form');
    }
}
