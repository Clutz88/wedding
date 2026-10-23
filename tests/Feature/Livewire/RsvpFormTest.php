<?php

use App\Enums\RsvpStage;
use App\Livewire\RsvpForm;
use App\Models\Guest;
use App\Models\Rsvp;
use Livewire\Livewire;

it('shows the form before the RSVP deadline', function () {
    fakeWeddingSettings();

    $rsvp = Rsvp::create(['name' => 'The Smiths', 'code' => 'SMITH1']);

    Livewire::test(RsvpForm::class, ['rsvp' => $rsvp])
        ->assertSet('stage', RsvpStage::FORM->value);
});

it('locks the form once the RSVP deadline has passed', function () {
    fakeWeddingSettings(['rsvp_deadline' => '2020-01-01 00:00:00']);

    $rsvp = Rsvp::create(['name' => 'The Smiths', 'code' => 'SMITH1']);

    Livewire::test(RsvpForm::class, ['rsvp' => $rsvp])
        ->assertSet('stage', RsvpStage::OVERVIEW->value)
        ->call('setStage', RsvpStage::FORM)
        ->assertSet('stage', RsvpStage::OVERVIEW->value);
});

it('saves attendance and dietary requirements for the party', function () {
    fakeWeddingSettings();

    $rsvp = Rsvp::create(['name' => 'The Smiths', 'code' => 'SMITH1']);
    $alice = Guest::create(['name' => 'Alice', 'rsvp_id' => $rsvp->id, 'type' => 'day', 'dietary_requirements' => []]);
    $bob = Guest::create(['name' => 'Bob', 'rsvp_id' => $rsvp->id, 'type' => 'day', 'dietary_requirements' => []]);

    Livewire::test(RsvpForm::class, ['rsvp' => $rsvp])
        ->set('attending', '1')
        ->set('attending_guests', [$alice->id])
        ->set('has_dietary_requirements', '1')
        ->set('dietary_requirements', collect([
            $alice->id => ['Vegetarian' => true, 'Gluten Free' => false],
            $bob->id => [],
        ]))
        ->set('song_request', 'Mr Brightside')
        ->set('message', 'See you there!')
        ->call('confirm')
        ->assertSet('stage', RsvpStage::OVERVIEW->value);

    expect($rsvp->fresh()->attending)->toBeTruthy()
        ->and($rsvp->fresh()->dietary_requirements)->toBeTruthy()
        ->and($rsvp->fresh()->song_request)->toBe('Mr Brightside')
        ->and($rsvp->fresh()->message)->toBe('See you there!')
        ->and($alice->fresh()->attending)->toBeTruthy()
        ->and($alice->fresh()->dietary_requirements)->toBe(['Vegetarian'])
        ->and($bob->fresh()->attending)->toBeFalsy()
        ->and($bob->fresh()->dietary_requirements)->toBe([]);
});

it('clears the party details when the invitation is declined', function () {
    fakeWeddingSettings();

    $rsvp = Rsvp::create([
        'name' => 'The Smiths',
        'code' => 'SMITH1',
        'attending' => true,
        'dietary_requirements' => true,
    ]);
    $alice = Guest::create([
        'name' => 'Alice',
        'rsvp_id' => $rsvp->id,
        'type' => 'day',
        'attending' => true,
        'dietary_requirements' => ['Vegan'],
    ]);

    Livewire::test(RsvpForm::class, ['rsvp' => $rsvp])
        ->set('attending', '0')
        ->set('has_dietary_requirements', '1')
        ->call('confirm');

    expect($rsvp->fresh()->attending)->toBeFalsy()
        ->and($rsvp->fresh()->dietary_requirements)->toBeNull()
        ->and($alice->fresh()->attending)->toBeFalsy();
});
