<x-slot:title>Itinerary</x-slot>
<x-section>
    <ol class="relative m-4 border-s border-gray-200 dark:border-gray-700">
        @foreach ($itineraries as $itinerary)
            <li class="ms-4 mb-10">
                <div
                    class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-gray-200 dark:border-gray-900 dark:bg-gray-700"
                ></div>
                <time class="mb-1 text-sm leading-none font-normal">{{ $itinerary->time }}</time>
                <h3 class="text-lg font-semibold">{{ $itinerary->name }}</h3>
                <article class="prose mb-4 text-base font-normal">{!! $itinerary->description !!}</article>
            </li>
        @endforeach
    </ol>
</x-section>
