<?php

use App\Livewire\Gallery;
use App\Models\Image;
use Livewire\Livewire;

it('shows images in the gallery', function () {
    Image::create([
        'description' => 'The ceremony',
        'location' => 'gallery/ceremony.jpg',
    ]);

    $this->get(route('gallery'))
        ->assertOk()
        ->assertSee('gallery/ceremony.jpg');
});

it('loads images twelve at a time', function () {
    foreach (range(1, 13) as $index) {
        Image::create([
            'description' => "Image {$index}",
            'location' => "gallery/{$index}.jpg",
        ]);
    }

    $component = Livewire::test(Gallery::class);

    expect($component->get('images')->flatten(2))->toHaveCount(12)
        ->and($component->get('page'))->toBe(2);

    $component->call('loadMore');

    expect($component->get('images')->flatten(2))->toHaveCount(13);
});
