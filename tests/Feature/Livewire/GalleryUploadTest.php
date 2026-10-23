<?php

use App\Livewire\GalleryUpload;
use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

it('stores an uploaded gallery image', function () {
    Storage::fake('public');

    Livewire::test(GalleryUpload::class)
        ->set('gallery', [UploadedFile::fake()->image('ceremony.jpg')])
        ->call('uploadGallery')
        ->assertSet('gallery', []);

    $image = Image::firstOrFail();

    expect($image->description)->toBe('upload')
        ->and($image->location)->toStartWith('gallery/')
        ->and(Storage::disk('public')->exists($image->location))->toBeTrue();
});
