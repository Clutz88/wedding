<?php

namespace App\Livewire;

use App\Models\Rsvp as RsvpModel;
use Livewire\Component;

class RsvpSearch extends Component
{
    public string $rsvp_code = '';

    public function search()
    {
        $code = str($this->rsvp_code)
            ->replace(' ', '')
            ->lower();

//        $rsvp = \App\Models\Rsvp::where('code', $code)->first();
        $rsvp = RsvpModel::first();

        if ($rsvp) {
            return to_route('rsvp', $rsvp);
        }
    }

    public function render()
    {
        return view('livewire.rsvp-search');
    }
}
