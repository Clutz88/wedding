<div class="py-6">
    <h2 class="pb-2 text-3xl uppercase">Overview</h2>
    <div class="mb-12 flex flex-col gap-6 rounded py-4">
        <div>
            <h3 class="mb-2 text-2xl">Attending</h3>
            <ul class="flex flex-col gap-2">
                @foreach ($rsvp->guests->whereIn('id', $attending_guests) as $guest)
                    <li class="flex flex-col">
                        <h4 class="text-xl">{{ $guest->name }}</h4>
                        <span>Dietary Requirements:</span>
                        @if (isset($dietary_requirements[$guest->id]))
                            <div class="prose">
                                <ul>
                                    @foreach ($dietary_requirements[$guest->id] as $requirement => $value)
                                        <li>{{ $requirement }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <span>N/A</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="mb-2 text-xl">Not Attending</h3>
            <ul class="flex flex-col gap-2">
                @foreach ($rsvp->guests->whereNotIn('id', $attending_guests) as $guest)
                    <li class="flex flex-col">
                        <h4 class="text-lg">{{ $guest->name }}</h4>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-end">
            <x-button wire:click.prevent="setOverview(true)" text="Confirm" />
        </div>
    </div>
</div>
