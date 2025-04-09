<?php

namespace App\Livewire;

use App\Models\Rsvp as RsvpModel;
use Livewire\Component;

class RsvpSearch extends Component
{
    public string $rsvp_code = '';

    public ?string $error_message;

    public function search()
    {
        $code = str($this->rsvp_code)
            ->replace(' ', '')
            ->lower();

        $rsvp = RsvpModel::whereRaw('LOWER(code) LIKE ?', $code)->first();

        if (! $rsvp) {
            $this->error_message = 'RSVP not found';

            return false;
        }

        return to_route('rsvp', $rsvp);
    }

    public function render()
    {
        return view('livewire.rsvp-search')->title('RSVP');
    }
}
