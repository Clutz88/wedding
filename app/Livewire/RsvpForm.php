<?php

namespace App\Livewire;

use App\Enums\RsvpStage;
use App\Models\Guest;
use App\Models\Rsvp as RsvpModel;
use Illuminate\Support\Collection;
use Livewire\Component;

class RsvpForm extends Component
{
    public ?string $attending = null;

    public ?string $has_dietary_requirements = null;

    public bool $overview = false;

    public string $stage;

    public string $type;

    public ?string $message = null;

    public ?string $song_request = null;

    public RsvpModel $rsvp;

    public array $attending_guests = [];

    public Collection $dietary_requirements;

    public function mount(RsvpModel $rsvp): void
    {
        $this->rsvp = $rsvp;
        $this->attending = $rsvp->attending === null ? null : (bool) $rsvp->attending;
        $this->has_dietary_requirements = $rsvp->dietary_requirements;
        $this->dietary_requirements = collect();
        $this->stage = $rsvp->attending === null ? RsvpStage::FORM->value : RsvpStage::OVERVIEW->value;
        $this->message = $rsvp->message;
        $this->song_request = $rsvp->song_request;
        $this->type = $rsvp->guests->first()?->type?->value ?? 'day';

        $this->rsvp->guests->each(function (Guest $guest) {
            if ($guest->attending) {
                $this->attending_guests[] = $guest->id;
            }
            $requirements = [];
            foreach ($guest->dietary_requirements as $requirement) {
                $requirements[$requirement] = true;
            }
            $this->dietary_requirements->put($guest->id, $requirements);
        });
    }

    public function setStage(RsvpStage $stage): void
    {
        $this->stage = $stage->value;
    }

    public function getDietaryRequirements(string $id): string
    {
        return collect($this->dietary_requirements[$id] ?? [])
            ->filter(fn ($value) => $value !== true)
            ->implode(fn ($value) => $value, ', ');
    }

    public function confirm()
    {
        // Update rsvp fields
        $this->rsvp->attending = (bool) $this->attending;
        $this->rsvp->dietary_requirements = $this->rsvp->attending ? (bool) $this->has_dietary_requirements : null;
        $this->rsvp->message = $this->message;
        $this->rsvp->song_request = $this->song_request;
        $this->rsvp->save();
        // Update each guest fields
        foreach ($this->rsvp->guests as $guest) {
            $guest->attending = $this->rsvp->attending && in_array($guest->id, $this->attending_guests);
            if ($this->rsvp->attending) {
                $guest->dietary_requirements = collect($this->dietary_requirements[$guest->id] ?? [])
                    ->filter(fn ($value) => $value === true)
                    ->keys();
            }
            $guest->save();
        }

        $this->stage = RsvpStage::OVERVIEW->value;
    }

    public function render()
    {
        return view('livewire.rsvp.form');
    }
}
