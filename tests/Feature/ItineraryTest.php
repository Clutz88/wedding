<?php

use App\Models\Itinerary;

it('lists the order of service in time order', function () {
    Itinerary::factory()->create([
        'name' => 'Ceremony',
        'description' => 'The vows',
        'time' => '14:30:00',
    ]);

    Itinerary::factory()->create([
        'name' => 'Wedding breakfast',
        'description' => 'The meal',
        'time' => '17:00:00',
    ]);

    $this->get(route('order-of-service'))
        ->assertOk()
        ->assertSee('Order of service')
        ->assertSee('Ceremony')
        ->assertSee('14:30')
        ->assertSee('Wedding breakfast')
        ->assertSee('17:00');
});
