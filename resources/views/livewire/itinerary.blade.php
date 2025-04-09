<x-section>
    <x-section-header title="Order of service">What to expect on the day.</x-section-header>

    <ol class="border-dark-green relative m-4 border-s-2 border-dotted">
        @foreach ($itineraries as $itinerary)
            <li class="ms-4 mb-8">
                <div class="absolute -start-[11px] mt-9 h-5 w-5 rounded-full text-red-600"><x-bxs-heart /></div>
                <time class="text-sm font-normal">{{ $itinerary->time }}</time>
                <h2 class="!mt-1 !mb-2 text-3xl lowercase first-letter:uppercase">{{ $itinerary->name }}</h2>
                <article class="prose mb-2 text-sm font-normal">{!! $itinerary->description !!}</article>
            </li>
        @endforeach
    </ol>
</x-section>
