<?php

use App\Models\Guest;
use App\Models\Rsvp;
use App\Models\User;

it('renders a public page', function (string $uri) {
    fakeWeddingSettings();

    $this->get($uri)
        ->assertOk()
        ->assertSee('Chris & Kate Wedding', false);
})->with([
    'home' => '/',
    'order of service' => '/order-of-service',
    'rsvp search' => '/rsvp',
    'gallery' => '/gallery',
    'gallery upload' => '/gallery/upload',
    'wedding photos' => '/wedding-photos',
    'upload photos' => '/upload-photos',
]);

it('renders the RSVP form for a party', function () {
    fakeWeddingSettings();

    $rsvp = Rsvp::create(['name' => 'The Smiths', 'code' => 'SMITH1']);
    Guest::create(['name' => 'Alice', 'rsvp_id' => $rsvp->id, 'type' => 'day', 'dietary_requirements' => []]);

    $this->get(route('rsvp', $rsvp))
        ->assertOk()
        ->assertSee('RSVP');
});

it('redirects the legacy page URLs to their CMS pages', function (string $legacy, string $slug) {
    $this->get($legacy)->assertRedirect(route('page', ['page' => $slug]));
})->with([
    'useful info' => ['/useful-info', 'useful-info'],
    'menu' => ['/menu', 'menu'],
]);

it('renders the admin login page', function () {
    $this->get('/admin/login')->assertOk();
});

it('redirects guests away from the admin panel', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

it('renders an admin page for an authenticated user', function (string $uri) {
    fakeWeddingSettings();
    fakeVenueSettings();

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get($uri)
        ->assertOk();
})->with([
    'dashboard' => '/admin',
    'pages' => '/admin/pages',
    'create page' => '/admin/pages/create',
    'guests' => '/admin/guests',
    'create guest' => '/admin/guests/create',
    'rsvps' => '/admin/rsvps',
    'create rsvp' => '/admin/rsvps/create',
    'users' => '/admin/users',
    'create user' => '/admin/users/create',
    'images' => '/admin/images',
    'create image' => '/admin/images/create',
    'itineraries' => '/admin/itineraries',
    'create itinerary' => '/admin/itineraries/create',
    'gallery photos' => '/admin/gallery-photos',
    'create gallery photo' => '/admin/gallery-photos/create',
    'manage wedding' => '/admin/manage-wedding',
    'manage venue' => '/admin/manage-venue',
]);
