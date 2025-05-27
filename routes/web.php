<?php

use App\Livewire\Gallery;
use App\Livewire\GalleryUpload;
use App\Livewire\Home;
use App\Livewire\Itinerary;
use App\Livewire\Page;
use App\Livewire\Rsvp;
use App\Livewire\RsvpSearch;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('order-of-service', Itinerary::class)->name('order-of-service');
Route::get('rsvp', RsvpSearch::class)->name('rsvp.search');
Route::get('rsvp/{rsvp}', Rsvp::class)->name('rsvp');
Route::get('gallery', Gallery::class)->name('gallery');
Route::get('gallery/upload', GalleryUpload::class)->name('gallery.upload');
Route::get('p/{page:slug}', Page::class)->name('page');

// Redirects
Route::get('useful-info', fn () => to_route('page', ['page' => 'useful-info']))->name('useful-info-redirect');
Route::get('menu', fn () => to_route('page', ['page' => 'menu']))->name('menu-redirect');
