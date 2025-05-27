<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;
use Livewire\Attributes\On;

class GalleryUpload extends Component
{
    use WithFilePond;

    public $gallery = [];
    public $filepondKey;
    public $canSubmit = false;

    public function mount()
    {
        $this->filepondKey = now()->timestamp; // Initialize with a unique key
    }

    public function rules(): array
    {
        return [
            'gallery.*' => 'required|mimetypes:image/*',
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
        $this->gallery = [];
        // Change the key to force re-render of FilePond
        $this->filepondKey = now()->timestamp;
        session()->flash('message', 'Post saved successfully!');
    }

    public function render()
    {
        return view('livewire.gallery-upload');
    }

    #[On('filepond-upload-started')]
    public function cannotSubmit($attribute)
    {
        $this->canSubmit = false;
    }

    #[On('filepond-upload-completed')]
    public function canSubmit($attribute)
    {
        $this->canSubmit = true;
    }
}
