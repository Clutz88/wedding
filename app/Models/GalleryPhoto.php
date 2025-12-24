<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryPhoto extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $guarded = ['id'];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('wedding-photos');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(600)
            ->nonQueued();

        $this->addMediaConversion('large')
            ->width(1600)
            ->nonQueued();
    }
}
