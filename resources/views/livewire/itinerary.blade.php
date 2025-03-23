<x-slot:title>Itinerary</x-slot>
<x-section>
    <h1 class="text-5xl pb-2">Order of service</h1>
    <p class="border-b border-dotted border-b-dark-green pb-8">This is what you can expect to happen on the day.</p>

    <ol class="relative m-4 mt-10 border-s border-dark-green">
        @foreach ($itineraries as $itinerary)
            <li class="ms-4 mb-10">
                <div
                    class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-dark-green"
                ></div>
                <time class="mb-1 text-sm leading-none font-normal">{{ $itinerary->time }}</time>
                <h3 class="text-lg font-semibold">{{ $itinerary->name }}</h3>
                <article class="prose mb-4 text-base font-normal">{!! $itinerary->description !!}</article>
            </li>
        @endforeach
    </ol>
</x-section>
