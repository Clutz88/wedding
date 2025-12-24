<x-section>
    <x-section-header title="Wedding Photo Gallery">
        <span class="flex flex-col gap-8 md:flex-row">
            <span>Take a look at some photos from our amazing day, we'd love to see your photos too! 📸🤵👰</span>
            <x-link-button class="w-60" href="{{ route('upload-photos') }}">Upload Your Photos</x-link-button>
        </span>
    </x-section-header>
    <div class="mb-6 flex items-center justify-between"></div>

    @if (session()->has('message'))
        <div class="mb-6 rounded bg-green-100 p-4 text-green-700">
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
            images: [
                @foreach ($photos as $photo)

                    @foreach ($photo->getMedia('wedding-photos') as $media)
                        { url: '{{ $media->getUrl('large') }}', originalUrl: '{{ $media->getUrl() }}', title: 'Photo by {{ $photo->guest_name }}' },
                    @endforeach
                @endforeach

            ],
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
        >
            @php
                $imageIndex = 0;
            @endphp

            @foreach ($photos as $photo)
                @foreach ($photo->getMedia('wedding-photos') as $media)
                    @php
                        $thumbUrl = $media->getUrl('thumb');
                        $originalUrl = $media->getUrl();
                        $currentIndex = $imageIndex++;
                    @endphp

                    <div class="mb-4 break-inside-avoid">
                        <a href="#" @click.prevent="openLightbox({{ $currentIndex }})" class="block cursor-pointer">
                            <img
                                src="{{ $thumbUrl }}"
                                alt="Photo by {{ $photo->guest_name }}"
                                class="w-full rounded-lg transition-transform hover:scale-105"
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
    @endif
</x-section>
