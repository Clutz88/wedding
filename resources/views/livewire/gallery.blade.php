<x-section>
    <x-section-header title="Gallery">
        Take a look at some photos from our amazing day, we'd love to see your photos too! 📸🤵👰
    </x-section-header>

    <livewire:gallery-upload />

    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach ($imageSplits as $imageSplit)
            <div class="grid gap-4">
                @foreach ($imageSplit as $image)
                    <div>
                        <img
                            @click="() => {
                            document.getElementById('modal-image').src = '{{ asset('storage/' . $image->location) }}';
{{-- document.getElementById('modal-title').innerText = '{{ $image->description }}'; --}}
                            window.modal.show();
                        }"
                            class="h-auto max-w-full rounded-lg"
                            src="{{ asset('storage/' . $image->location) }}"
                            alt=""
                        />
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div
        id="image-modal"
        tabindex="-1"
        aria-hidden="true"
        class="fixed top-0 right-0 left-0 z-50 hidden min-h-screen min-w-screen items-center justify-center overflow-x-hidden overflow-y-auto before:fixed before:h-screen before:w-screen before:bg-black/70 md:inset-0"
    >
        <!-- Modal content -->
        <div class="relative flex h-fit w-fit flex-col shadow-sm">
            <!-- Modal header -->
            {{-- <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5"> --}}
            {{-- <h3 --}}
            {{-- class="!font-quick absolute bottom-0 z-60 w-full bg-gradient-to-b from-transparent to-black py-2 text-center text-xl font-semibold !text-white" --}}
            {{-- id="modal-title" --}}
            {{-- ></h3> --}}
            <button
                type="button"
                class="absolute top-5 right-5 z-60 inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg bg-transparent text-sm text-gray-900 hover:bg-gray-400 hover:text-gray-900"
                @click="window.modal.hide()"
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
            {{-- </div> --}}
            <!-- Modal body -->
            <div class="mx-auto flex grow items-center">
                <img class="z-50 h-auto max-h-screen max-w-screen" src="" id="modal-image" alt="" />
            </div>
        </div>
    </div>
</x-section>
