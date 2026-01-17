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
            x-data="{
                lightbox: null,
                currentMediaId: null,
                columns: 2,
                init() {
                    this.updateColumns();
                    window.addEventListener('resize', () => this.updateColumns());
                },
                updateColumns() {
                    const width = window.innerWidth;
                    if (width >= 1024) this.columns = 4;
                    else if (width >= 768) this.columns = 3;
                    else this.columns = 2;
                },
                getAllImageIds() {
                    return Array.from(document.querySelectorAll('[data-media-id]')).map(el => parseInt(el.dataset.mediaId));
                },
                getImageData(mediaId) {
                    const el = document.querySelector(`[data-media-id='${mediaId}']`);
                    return el ? JSON.parse(el.dataset.photoData) : null;
                },
                openLightbox(mediaId) {
                    this.currentMediaId = mediaId;
                    this.lightbox = this.getImageData(mediaId);
                },
                nextImage() {
                    const ids = this.getAllImageIds();
                    const currentIndex = ids.indexOf(this.currentMediaId);
                    const nextIndex = (currentIndex + 1) % ids.length;
                    this.currentMediaId = ids[nextIndex];
                    this.lightbox = this.getImageData(this.currentMediaId);
                },
                prevImage() {
                    const ids = this.getAllImageIds();
                    const currentIndex = ids.indexOf(this.currentMediaId);
                    const prevIndex = (currentIndex - 1 + ids.length) % ids.length;
                    this.currentMediaId = ids[prevIndex];
                    this.lightbox = this.getImageData(this.currentMediaId);
                }
            }"
            @keydown.arrow-right.window="if (lightbox) nextImage()"
            @keydown.arrow-left.window="if (lightbox) prevImage()"
        >
            <div class="flex gap-4">
                <template x-for="col in columns" :key="col">
                    <div class="flex-1 space-y-4">
                        @foreach ($photos as $index => $photo)
                            <template x-if="({{ $index }} % columns) === (col - 1)">
                                <div wire:key="photo-{{ $photo->id }}"
                                     data-media-id="{{ $photo->id }}"
                                     data-photo-data="{{ json_encode(['url' => $photo->large_url, 'originalUrl' => $photo->original_url, 'title' => 'Photo by ' . $photo->guest_name]) }}">
                                    <a href="#" @click.prevent="openLightbox({{ $photo->id }})" class="block cursor-pointer">
                                        <img
                                            src="{{ $photo->thumb_url }}"
                                            alt="Photo by {{ $photo->guest_name }}"
                                            class="h-auto w-full rounded-lg bg-gray-200 transition-transform hover:scale-105"
                                            loading="lazy"
                                        />
                                    </a>
                                </div>
                            </template>
                        @endforeach
                    </div>
                </template>
            </div>

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
            <div x-intersect:enter.margin.500px="$wire.loadMore()" class="flex justify-center py-8">
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
