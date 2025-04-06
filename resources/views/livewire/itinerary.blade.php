<x-slot:title>Itinerary</x-slot>
<x-section>
    <x-section-header title="Order of service">What to expect on the day.</x-section-header>

    <ol class="border-dark-green relative m-4 border-s-2 border-dotted">
        @foreach ($itineraries as $itinerary)
            <li class="ms-4 mb-8">
                <div class=" absolute -start-[11px] mt-9 h-5 w-5 rounded-full text-red-600 "><x-bxs-heart /></div>
                <time class="font-normal text-sm">{{ $itinerary->time }}</time>
                <h2 class="text-3xl mb-2 mt-1 lowercase first-letter:uppercase">{{ $itinerary->name }}</h2>
                <article class="prose mb-2 font-normal text-sm">{!! $itinerary->description !!}</article>
            </li>
        @endforeach
    </ol>
</x-section>
