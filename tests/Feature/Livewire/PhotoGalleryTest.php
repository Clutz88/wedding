<?php

use App\Livewire\PhotoGallery;
use App\Models\GalleryPhoto;
use Livewire\Livewire;

function createGalleryPhotoWithMedia(string $guestName, bool $approved = true, array $conversions = ['thumb' => true, 'large' => true]): GalleryPhoto
{
    $photo = GalleryPhoto::create([
        'guest_name' => $guestName,
        'is_approved' => $approved,
    ]);

    $photo->media()->create([
        'collection_name' => 'wedding-photos',
        'name' => 'wedding-photo',
        'file_name' => 'wedding-photo.jpg',
        'mime_type' => 'image/jpeg',
        'disk' => 'public',
        'size' => 1024,
        'manipulations' => [],
        'custom_properties' => [],
        'generated_conversions' => $conversions,
        'responsive_images' => [],
        'conversions_disk' => 'public',
    ]);

    return $photo;
}

it('shows only approved photos that can be displayed', function () {
    createGalleryPhotoWithMedia('Alice');
    createGalleryPhotoWithMedia('Bob', approved: false);
    createGalleryPhotoWithMedia('Carol', conversions: []);

    Livewire::test(PhotoGallery::class)
        ->assertSee('Photo by Alice')
        ->assertDontSee('Photo by Bob')
        ->assertDontSee('Photo by Carol');
});

it('loads photos twenty at a time', function () {
    foreach (range(1, 21) as $index) {
        createGalleryPhotoWithMedia("Guest {$index}");
    }

    $component = Livewire::test(PhotoGallery::class);

    expect($component->get('photos'))->toHaveCount(20)
        ->and($component->get('hasMorePages'))->toBeTrue();

    $component->call('loadMore');

    expect($component->get('photos'))->toHaveCount(21)
        ->and($component->get('hasMorePages'))->toBeFalse();
});
