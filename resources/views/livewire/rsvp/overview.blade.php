<div class="py-6">
    <h2 class="pb-2 text-3xl uppercase">Overviewed</h2>
    <div class="mb-12 flex flex-col gap-6 rounded py-4">
        @if ($rsvp->guests->whereIn('id', $attending_guests)->isNotEmpty())
            <div>
                <h3 class="mb-2 text-2xl">Attending</h3>
                <ul class="flex flex-col gap-2">
                    @foreach ($rsvp->guests->whereIn('id', $attending_guests) as $guest)
                        <li class="flex flex-col">
                            <h4 class="text-xl">{{ $guest->name }}</h4>

                            @if (isset($dietary_requirements[$guest->id]))
                                @php
                                    $requirements = collect($dietary_requirements[$guest->id])
                                        ->filter(fn ($value) => $value == true)
                                        ->implode(fn ($value) => $value, ',');
                                @endphp

                                <span>{{ $requirements }}</span>
                            @else
                                <span>None</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($rsvp->guests->whereNotIn('id', $attending_guests)->isNotEmpty())
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
        @endif

        <div class="flex justify-end">
            <x-button wire:click.prevent="confirm()" text="Confirm" />
        </div>
    </div>
</div>
