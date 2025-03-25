<div class="mt-9">
    <div id="logo" class="flex w-screen flex-col items-center">
        <span class="font-quick mb-4 text-xs">
            The
            <span class="font-brittany text-3xl">wedding</span>
            of
        </span>
        <h1 class="mb-2 text-5xl md:text-7xl">Chris & Kate</h1>
        <span class="font-semibold">{{ \App\Facades\Wedding::date()->format('d F Y') }}</span>
        <span class="font-quick text-xs">The Croft Hotel, Darlington</span>
        <div class="mt-8 mb-8 flex flex-col gap-5 md:flex-row">
            <x-link-button :href="route('rsvp.search')">RSVP</x-link-button>
            <x-link-button :href="route('order-of-service')">Order of Service</x-link-button>
            <x-link-button :href="route('venue')">Useful Info</x-link-button>
        </div>
        <img src="{{ Vite::asset('resources/images/flower.avif') }}" class="w-56 md:w-96" alt="" />
    </div>
</div>
