<?php

namespace App\Livewire;

use App\Models\GalleryPhoto;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;
use Livewire\Attributes\On;

class PhotoUploader extends Component
{
    use WithFilePond;

    public array $photos = [];
    public string $guest_name = '';
    public int $filepondKey;
    public bool $canSubmit = false;

    public function mount(): void
    {
        $this->filepondKey = (int) now()->timestamp;
    }

    public function rules(): array
    {
        return [
            'photos.*' => 'required|mimetypes:image/*',
        ];
    }

    public function validateUploadedFile(): bool
    {
        $this->validate();
        return true;
    }

    public function submit(): void
    {
        $this->validate([
            'guest_name' => 'required|string|max:255',
            'photos' => 'required|array|min:1',
        ]);

        $galleryPhoto = null;

        try {
            $galleryPhoto = GalleryPhoto::create([
                'guest_name' => $this->guest_name,
                'is_approved' => true,
            ]);

            foreach ($this->photos as $photo) {
                $galleryPhoto
                    ->addMedia($photo)
                    ->toMediaCollection('wedding-photos');
            }

            session()
                ->flash(
                    'message',
                    'Thank you! Your photos have been uploaded and will appear in the gallery once approved.'
                );

            $this->redirect(route('wedding-photos'), navigate: true);
        } catch (\Exception $e) {
            // Clean up the gallery photo record if media attachment failed
            if ($galleryPhoto) {
                $galleryPhoto->delete();
            }

            session()->flash('error', 'Sorry, there was an error uploading your photos. Please try again.');

            throw $e;
        }
    }

    public function render(): View
    {
        return view('livewire.photo-uploader');
    }

    #[On('filepond-upload-started')]
    public function cannotSubmit(): void
    {
        $this->canSubmit = false;
    }

    #[On('filepond-upload-completed')]
    public function canSubmit(): void
    {
        $this->canSubmit = true;
    }
}
