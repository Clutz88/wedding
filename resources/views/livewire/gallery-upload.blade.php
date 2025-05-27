<div>
    @filepondScripts
    <x-filepond::upload wire:model="gallery" multiple="true" credits="false" />
    <button wire:click="uploadGallery">Upload</button>
</div>
