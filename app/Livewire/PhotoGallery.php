<?php

namespace App\Livewire;

use App\Models\GalleryPhoto;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class PhotoGallery extends Component
{
    public Collection $photos;
    public int $perPage = 15;
    public int $page = 1;
    public bool $hasMorePages = true;

    public function mount(): void
    {
        $this->photos = collect();
        $this->loadMore();
    }

    public function loadMore(): void
    {
        if (!$this->hasMorePages) {
            return;
        }

        $newPhotos = GalleryPhoto::where('is_approved', true)
            ->with('media')
            ->latest()
            ->skip(($this->page - 1) * $this->perPage)
            ->take($this->perPage)
            ->get();

        if ($newPhotos->isEmpty() || $newPhotos->count() < $this->perPage) {
            $this->hasMorePages = false;
        }

        $this->photos = $this->photos->merge($newPhotos);
        $this->page++;
    }

    public function render(): View
    {
        return view('livewire.photo-gallery');
    }
}
