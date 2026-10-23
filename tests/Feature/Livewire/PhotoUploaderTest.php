<?php

use App\Livewire\PhotoUploader;
use App\Models\GalleryPhoto;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

it('requires a name and at least one photo', function () {
    Livewire::test(PhotoUploader::class)
        ->call('submit')
        ->assertHasErrors([
            'guest_name' => 'required',
            'photos' => 'required',
        ]);
});

it('stores the uploaded photos against the guest', function () {
    Storage::fake('public');
    Queue::fake();

    Livewire::test(PhotoUploader::class)
        ->set('guest_name', 'Alice')
        ->set('photos', [UploadedFile::fake()->image('wedding.jpg')])
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('wedding-photos'));

    $photo = GalleryPhoto::firstOrFail();

    expect($photo->guest_name)->toBe('Alice')
        ->and($photo->is_approved)->toBeTrue()
        ->and($photo->getMedia('wedding-photos'))->toHaveCount(1)
        ->and($photo->getMedia('wedding-photos')->first()->file_name)->toBe('wedding.jpg');
});
