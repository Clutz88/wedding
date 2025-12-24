<x-section>
    <x-section-header title="Wedding Photo Gallery">
        <span class="flex flex-col gap-8 md:flex-row">
            <span>Take a look at some photos from our amazing day, we'd love to see your photos too! 📸🤵👰</span>
            <x-link-button class="w-60" href="{{ route('upload-photos') }}">Upload Your Photos</x-link-button>
        </span>
    </x-section-header>
    <div class="mb-6 flex items-center justify-between"></div>

    @if (session()->has('message'))
        <div class="bg-dark-green text-light-green mb-6 rounded p-4 text-center">
            {{ session('message') }}
        </div>
    @endif

    @if ($photos->isEmpty())
        <p class="text-gray-600">No approved photos yet. Be the first to share your photos!</p>
    @else
        <div
            class="columns-2 gap-4 md:columns-3 lg:columns-4"
            x-data="{
                lightbox: null,
                currentIndex: 0,
                images: [],
                init() {
                    // Initialize images array from initially loaded photos
                    @php
                    $initIndex = 0;

@endphp
                    @foreach ($photos as $photo)










                        @foreach ($photo->getMedia('wedding-photos') as $media)










                            @if ($media->hasGeneratedConversion('thumb'))
                                this.images.push({
                                    url: '{{ $media->getUrl('large') }}',
                                    originalUrl: '{{ $media->getUrl() }}',
                                    title: 'Photo by {{ $photo->guest_name }}'
                                });
                            @endif
                        @endforeach
                    @endforeach










                },
                openLightbox(index) {
                    this.currentIndex = index;
                    this.lightbox = this.images[index];
                },
                nextImage() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                    this.lightbox = this.images[this.currentIndex];
                },
                prevImage() {
                    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                    this.lightbox = this.images[this.currentIndex];
                }
            }"
            @keydown.arrow-right.window="if (lightbox) nextImage()"
            @keydown.arrow-left.window="if (lightbox) prevImage()"
            wire:update="$refresh"
        >
            @php
                $imageIndex = 0;
            @endphp

            @foreach ($photos as $photo)
                @foreach ($photo->getMedia('wedding-photos') as $media)
                    @php
                        // Check if thumb conversion exists
                        $hasThumb = $media->hasGeneratedConversion('thumb');
                        if (! $hasThumb) {
                            continue; // Skip this image if conversion isn't ready
                        }

                        $thumbUrl = $media->getUrl('thumb');
                        $currentIndex = $imageIndex++;
                    @endphp

                    <div class="mb-4 break-inside-avoid">
                        <a href="#" @click.prevent="openLightbox({{ $currentIndex }})" class="block cursor-pointer">
                            <img
                                src="{{ $thumbUrl }}"
                                alt="Photo by {{ $photo->guest_name }}"
                                class="h-auto w-full rounded-lg bg-gray-200 transition-transform hover:scale-105"
                                style="min-height: 300px"
                                loading="lazy"
                            />
                        </a>
                    </div>
                @endforeach
            @endforeach

            <!-- Lightbox Modal -->
            <div
                x-show="lightbox !== null"
                x-cloak
                @click="lightbox = null"
                @keydown.escape.window="lightbox = null"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/70"
            >
                <button
                    @click="lightbox = null"
                    class="absolute top-4 right-4 z-10 text-4xl text-white hover:text-gray-300"
                    type="button"
                >
                    &times;
                </button>

                <!-- Download Button -->
                <a
                    :href="lightbox?.originalUrl"
                    :download="'wedding-photo-' + (currentIndex + 1) + '.jpg'"
                    @click.stop
                    class="absolute top-4 right-16 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-black/70 text-white hover:text-gray-300"
                    title="Download original image"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                        />
                    </svg>
                </a>

                <!-- Previous Button -->
                <button
                    @click.stop="prevImage()"
                    class="absolute top-1/2 left-4 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-black/70 text-5xl text-white hover:text-gray-300"
                    type="button"
                >
                    ‹
                </button>

                <!-- Next Button -->
                <button
                    @click.stop="nextImage()"
                    class="bg-opacity-50 absolute top-1/2 right-4 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-black/70 text-5xl text-white hover:text-gray-300"
                    type="button"
                >
                    ›
                </button>

                <img
                    x-show="lightbox"
                    :src="lightbox?.url"
                    :alt="lightbox?.title"
                    class="max-h-screen max-w-screen p-4"
                    @click.stop
                />
                <div
                    x-show="lightbox?.title"
                    x-text="lightbox?.title"
                    class="absolute bottom-4 w-full text-center text-white"
                ></div>
            </div>
        </div>

        <!-- Infinite Scroll Trigger -->
        @if ($hasMorePages)
            <div x-intersect="$wire.loadMore()" class="flex justify-center py-8">
                <div class="text-gray-500">
                    <svg
                        class="h-8 w-8 animate-spin"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                    </svg>
                </div>
            </div>
        @endif
    @endif
</x-section>
