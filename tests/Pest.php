<?php

use App\Settings\Venue;
use App\Settings\Wedding;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Sleep;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(TestCase::class)
    ->use(LazilyRefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Global Isolation
|--------------------------------------------------------------------------
|
| Keep every feature test off the network and make sleeping instant so a
| retry or backoff cannot slow the suite down.
|
*/

pest()->beforeEach(function () {
    Http::preventStrayRequests();
    Sleep::fake(syncWithCarbon: true);
})->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * Bind wedding settings for the current test without touching the database.
 *
 * @param  array<string, string>  $overrides
 */
function fakeWeddingSettings(array $overrides = []): void
{
    Wedding::fake([
        'date' => '2026-03-06 13:30:00',
        'rsvp_deadline' => '2027-04-10 00:00:00',
        'groom' => 'Chris',
        'bride' => 'Kate',
        ...$overrides,
    ]);
}

/**
 * Bind venue settings for the current test without touching the database.
 *
 * @param  array<string, string|null>  $overrides
 */
function fakeVenueSettings(array $overrides = []): void
{
    Venue::fake([
        'name' => 'The Croft Hotel',
        'address_line_one' => 'Croft-on-Tees',
        'town' => 'Darlington',
        'postcode' => 'DL2 2ST',
        'website' => 'https://www.croft-hotel.com/',
        'maps_link' => 'https://maps.app.goo.gl/rY4pXF4rHU5z6xnT6',
        ...$overrides,
    ]);
}
