<?php

use App\Livewire\RsvpSearch;
use App\Models\Rsvp;
use Livewire\Livewire;

it('finds an RSVP regardless of case and spaces', function () {
    $rsvp = Rsvp::create([
        'name' => 'The Smiths',
        'code' => 'ABC123',
    ]);

    Livewire::test(RsvpSearch::class)
        ->set('rsvp_code', ' abc 123 ')
        ->call('search')
        ->assertRedirect(route('rsvp', $rsvp));
});

it('shows an error when the RSVP code is unknown', function () {
    Livewire::test(RsvpSearch::class)
        ->set('rsvp_code', 'NOPE')
        ->call('search')
        ->assertSet('error_message', 'RSVP not found')
        ->assertNoRedirect();
});
