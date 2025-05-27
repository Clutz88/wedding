<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class GalleryUpload extends Component
{
    use WithFilePond;

    public $gallery = [];

    public function rules(): array
    {
        return [
            'gallery.*' => 'required|mimetypes:image/*|max:3000',
        ];
    }
    public function validateUploadedFile()
    {
        $this->validate();

        return true;
    }

    public function uploadGallery()
    {
        foreach ($this->gallery as $image) {
            Image::create([
                'description' => 'upload',
                'location' => $image->store(path: 'gallery', options: 'public')
            ]);
        }
    }

    public function render()
    {
        return view('livewire.gallery-upload');
    }
}
