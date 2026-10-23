<?php

it('shows the wedding date and venue', function () {
    fakeWeddingSettings(['date' => '2026-03-06 13:30:00']);

    $this->get('/')
        ->assertOk()
        ->assertSee('Chris & Kate', false)
        ->assertSee('06 March 2026')
        ->assertSee('The Croft Hotel, Darlington');
});
