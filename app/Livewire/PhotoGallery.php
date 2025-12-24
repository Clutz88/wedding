<?php

namespace App\Livewire;

use App\Models\GalleryPhoto;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class PhotoGallery extends Component
{
    public Collection $photos;

    public function mount(): void
    {
        $this->loadPhotos();
    }

    public function loadPhotos(): void
    {
        $this->photos = GalleryPhoto::where('is_approved', true)
            ->with('media')
            ->latest()
            ->get();
    }

    public function render(): View
    {
        return view('livewire.photo-gallery');
    }
}
