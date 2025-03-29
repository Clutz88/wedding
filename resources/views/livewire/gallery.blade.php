<x-section>
    <x-section-header title="Gallery">
        Take a look at some photos from our amazing day, we'd love to see your photos too! 📸🤵👰
    </x-section-header>

    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        <div class="grid gap-4">
            @foreach ($images as $image)
                <div>
                    <img
                        data-modal-target="image-modal"
                        data-modal-toggle="image-modal"
                        @click="() => {
                            document.getElementById('modal-image').src = '{{ asset($image->location) }}';
                            document.getElementById('modal-title').innerText = '{{ $image->description }}';
                        }"
                        class="h-auto max-w-full rounded-lg"
                        src="{{ asset('storage/' . $image->location) }}"
                        alt=""
                    />
                </div>
            @endforeach

            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg"
                    alt=""
                />
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg"
                    alt=""
                />
            </div>
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg"
                    alt=""
                />
            </div>
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg"
                    alt=""
                />
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg"
                    alt=""
                />
            </div>
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg"
                    alt=""
                />
            </div>
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg"
                    alt=""
                />
            </div>
        </div>
        <div class="grid gap-4">
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg"
                    alt=""
                />
            </div>
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg"
                    alt=""
                />
            </div>
            <div>
                <img
                    data-modal-target="image-modal"
                    data-modal-toggle="image-modal"
                    @click="() => {
                            document.getElementById('modal-image').src = 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg';
                            document.getElementById('modal-title').innerText = 'Image';
                        }"
                    class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg"
                    alt=""
                />
            </div>
        </div>
    </div>

    <div
        id="image-modal"
        tabindex="-1"
        aria-hidden="true"
        class="fixed top-0 right-0 left-0 z-50 mx-auto hidden h-[calc(100%-1rem)] max-h-full w-fit items-center justify-center overflow-x-hidden overflow-y-auto before:fixed before:h-screen before:w-screen before:bg-black/70 md:inset-0"
    >
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <!-- Modal content -->
            <div class="bg-background relative rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                    <h3 class="text-xl font-semibold text-gray-900" id="modal-title"></h3>
                    <button
                        type="button"
                        class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                        data-modal-hide="image-modal"
                    >
                        <svg
                            class="h-3 w-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-2 md:p-5">
                    <img class="h-auto max-w-full rounded-lg" src="" id="modal-image" alt="" />
                </div>
            </div>
        </div>
    </div>
</x-section>
