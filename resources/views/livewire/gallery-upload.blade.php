<form wire:submit.prevent="uploadGallery">
    @if (session()->has('message'))
        <div class="mt-4 rounded bg-green-100 p-3 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    @filepondScripts
    <x-filepond::upload
        wire:model.live="gallery"
        multiple="true"
        credits="false"
        wire:key="featured-image-{{ $filepondKey }}"
    />
    @if ($canSubmit)
        <button type="submit">Upload</button>
    @endif
</form>
