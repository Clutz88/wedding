<?php

use App\Livewire\Home;
use App\Livewire\Itinerary;
use App\Livewire\Page;
use App\Livewire\Rsvp;
use App\Livewire\Venue;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('order-of-service', Itinerary::class);
Route::get('venue', Venue::class);
Route::get('rsvp/{rsvp}', Rsvp::class)->name('rsvp');
Route::get('faq', Home::class);
Route::get('{page:slug}', Page::class);
