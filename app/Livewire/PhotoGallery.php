<?php

namespace App\Livewire;

use App\Models\GalleryPhoto;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PhotoGallery extends Component
{
    public Collection $photos;
    public int $perPage = 20;
    public int $offset = 0;
    public bool $hasMorePages = true;
    public bool $isLoading = false;

    public function mount(): void
    {
        $this->photos = collect();
        $this->offset = 0;
        $this->hasMorePages = true;
        $this->loadMore();

        // Debug: output to browser console
        $this->dispatch('console-log', count: $this->photos->count());
    }

    public function loadMore(): void
    {
        // Prevent multiple simultaneous loads
        if (!$this->hasMorePages || $this->isLoading) {
            return;
        }

        $this->isLoading = true;

        // Query media directly from the database with pagination
        $mediaRecords = Media::select('media.*', 'gallery_photos.guest_name')
            ->join('gallery_photos', 'media.model_id', '=', 'gallery_photos.id')
            ->where('media.model_type', GalleryPhoto::class)
            ->where('media.collection_name', 'wedding-photos')
            ->where('gallery_photos.is_approved', true)
            ->whereJsonContains('media.generated_conversions', ['thumb' => true])
            ->orderBy('gallery_photos.created_at', 'desc')
            ->orderBy('media.id', 'desc')
            ->offset($this->offset)
            ->limit($this->perPage)
            ->get();

        $newPhotos = $mediaRecords->map(function ($media) {
            // Precompute URLs to avoid lazy loading
            return (object) [
                'id' => $media->id,
                'guest_name' => $media->guest_name,
                'thumb_url' => $media->getUrl('thumb'),
                'large_url' => $media->getUrl('large'),
                'original_url' => $media->getUrl(),
            ];
        });

        if ($newPhotos->isEmpty() || $newPhotos->count() < $this->perPage) {
            $this->hasMorePages = false;
        }

        $this->photos = $this->photos->merge($newPhotos);
        $this->offset += $this->perPage;
        $this->isLoading = false;
    }

    public function render(): View
    {
        return view('livewire.photo-gallery');
    }
}
