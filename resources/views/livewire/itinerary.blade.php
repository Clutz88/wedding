<x-slot:title>Itinerary</x-slot:title>
<div class="flex my-12 bg-light-green mx-4">
    <ol class="relative border-s border-gray-200 dark:border-gray-700 m-4">
        @foreach($itineraries as $itinerary)
        <li class="mb-10 ms-4">
            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
            <time class="mb-1 text-sm font-normal leading-none ">{{$itinerary->time}}</time>
            <h3 class="text-lg font-semibold ">{{$itinerary->name}}</h3>
            <article class="mb-4 text-base font-normal  prose">{!! $itinerary->description !!}</article>
        </li>
        @endforeach
    </ol>


</div>
