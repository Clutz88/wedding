<x-section>
    <x-section-header title="Share Your Wedding Photos">Upload your photos from our special day! 📸</x-section-header>

    @if (session()->has('message'))
        <div class="mb-6 rounded bg-green-100 p-4 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="mx-auto max-w-3xl space-y-6">
        <div class="flex flex-col">
            <div class="flex justify-end">
                @if (! $canSubmit && count($photos) > 0)
                    <p class="mt-2 text-sm text-gray-600 italic">Please wait while your files are uploading.</p>
                @endif
            </div>
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium sr-only">Photos</label>
            <div class="max-h-96 overflow-y-auto">
                <x-filepond::upload
                    wire:model.live="photos"
                    multiple="true"
                    credits="false"
                    wire:key="wedding-photos-{{ $filepondKey }}"
                />
            </div>
            @error('photos')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="guest_name" class="mb-2 block text-sm font-medium sr-only">Your Name</label>
            <input
                type="text"
                id="guest_name"
                wire:model="guest_name"
                class="w-full rounded-lg border border-gray-300 p-3"
                placeholder="Enter your name"
                required
            />
            @error('guest_name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col">
            <div class="flex justify-end">
                <x-button
                    type="submit"
                    class="w-full px-6 py-3 transition disabled:cursor-not-allowed disabled:opacity-50 md:w-fit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    :disabled="!$canSubmit && count($photos) > 0"
                >
                    @if (! $canSubmit && count($photos) > 0)
                        <span>Uploading files...</span>
                    @else
                        <span wire:loading.remove wire:target="submit">Upload Photos</span>
                        <span wire:loading wire:target="submit">Submitting...</span>
                    @endif
                </x-button>
            </div>

            <div class="flex justify-end">
                @if (! $canSubmit && count($photos) > 0)
                    <p class="mt-2 text-sm text-gray-600">Please wait while your files are uploading.</p>
                @endif
            </div>
        </div>
    </form>
</x-section>
