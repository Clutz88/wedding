<form class="flex flex-col gap-4 rounded py-6">
    <div class="flex flex-col gap-4">
        <h2 class="mt-8 flex items-center gap-1 text-3xl uppercase">Can you attend as a day guest?</h2>
        <div class="flex gap-4">
            <x-button :active="$attending" wire:click.prevent="setAttending(true)" text="Yes!" />
            <x-button :active="$attending === false" wire:click.prevent="setAttending(false)" text="No" />
        </div>
        @if ($attending)
            <p>Woohoo! We can't wait to see you there! 🥳</p>
        @endif
    </div>

    @if ($attending)
        <div class="flex flex-col gap-4">
            <h2 class="mt-8 flex items-center gap-1 text-3xl uppercase">
                Who's Attending?
                <span class="text-xs">Tick all that apply</span>
            </h2>
            <ul class="flex flex-col gap-2">
                @foreach ($rsvp->guests as $index => $guest)
                    <li><x-toggle :id="$guest->id" model="attending_guests" :text="$guest->name" /></li>
                @endforeach
            </ul>
        </div>

        <div class="flex flex-col gap-4">
            @if (! empty($attending_guests))
                <h2 class="mt-8 flex items-center gap-1 text-3xl uppercase">Any dietary requirements in your party?</h2>
                <div class="flex gap-4">
                    <x-button
                        :active="$has_dietary_requirements"
                        wire:click.prevent="setHasDietaryRequirements(true)"
                        text="Yes"
                    />
                    <x-button
                        :active="$has_dietary_requirements === false"
                        wire:click.prevent="setHasDietaryRequirements(false)"
                        text="No"
                    />
                </div>
            @endif

            @if (! empty($attending_guests) && $has_dietary_requirements)
                <p class="text-sm">Tell us about them</p>
                @foreach ($rsvp->guests as $index => $guest)
                    @if (in_array($guest->id, $attending_guests))
                        <x-rsvp.dietary-requirements model="dietary_requirements.{{$guest->id}}" :guest="$guest" />
                    @endif
                @endforeach
            @endif
        </div>
    @elseif ($attending !== null)
        <label for="message" class="mb-2">We're sorry you can't make it, use the box below to leave a message.</label>
        <textarea
            id="message"
            rows="4"
            class="placeholder-dark-green border-dark-green block w-full rounded-lg border bg-white p-2.5 text-sm"
            placeholder="Write your thoughts here..."
        ></textarea>
    @endif
    @if ($attending === false || ($attending === true && $has_dietary_requirements !== null))
        <div class="flex justify-end">
            <x-button wire:click.prevent="setOverview(true)" text="Next" />
        </div>
    @endif
</form>
