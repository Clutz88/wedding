<x-slot:title>Itinerary</x-slot>
<x-section>
    <x-section-header title="Order of service">This is what you can expect to happen on the day.</x-section-header>

    <ol class="border-dark-green relative m-4 border-s">
        @foreach ($itineraries as $itinerary)
            <li class="ms-4 mb-10">
                <div class="bg-dark-green absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-white"></div>
                <time class="mb-1 text-sm leading-none font-normal">{{ $itinerary->time }}</time>
                <h2 class="text-3xl lowercase first-letter:uppercase">{{ $itinerary->name }}</h2>
                <article class="prose mb-4 text-base font-normal">{!! $itinerary->description !!}</article>
            </li>
        @endforeach
    </ol>
</x-section>
