<?php

use App\Livewire\Gallery;
use App\Livewire\Home;
use App\Livewire\Itinerary;
use App\Livewire\Page;
use App\Livewire\Rsvp;
use App\Livewire\RsvpSearch;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('order-of-service', Itinerary::class)->name('order-of-service');
// Route::get('venue', Venue::class)->name('venue');
Route::get('rsvp', RsvpSearch::class)->name('rsvp.search');
Route::get('rsvp/{rsvp}', Rsvp::class)->name('rsvp');
Route::get('gallery', Gallery::class)->name('gallery');
// Route::get('menu', Menu::class)->name('menu');

// Route::bind('page', function ($value) {
//    return \App\Models\Page::with('seo')->where('slug', $value)->firstOrFail();
// });
Route::get('{page:slug}', Page::class)->name('page');
