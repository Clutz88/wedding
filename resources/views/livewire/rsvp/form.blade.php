<div>
    @if ($stage === \App\Enums\RsvpStage::FORM->value)
        <form class="flex flex-col gap-4 rounded">
            <div class="mt-8 flex flex-col gap-5">
                <h2 class="flex items-center gap-1 text-3xl">Can you attend as a day guest?</h2>
                {{-- <div class="flex flex-col items-center gap-4"> --}}
                {{-- <x-button :active="$attending" wire:click.prevent="setAttending(true)" text="Yes!" /> --}}
                {{-- <x-button :active="$attending === false" wire:click.prevent="setAttending(false)" text="No" /> --}}
                {{-- </div> --}}
                <div class="flex gap-6">
                    <x-radio-button model="attending" :value="true" name="yes_attending">Yes</x-radio-button>
                    <x-radio-button model="attending" :value="false" name="no_attending">No</x-radio-button>
                </div>
                @if ($attending)
                    <p>Woohoo! We can't wait to see you there! 🥳</p>
                @endif
            </div>

            @if ($attending)
                <div class="flex flex-col">
                    <h2 class="mt-8 mb-4 text-3xl">Who's attending?</h2>
                    <ul class="flex flex-col gap-4">
                        @foreach ($rsvp->guests as $index => $guest)
                            <li><x-toggle :id="$guest->id" model="attending_guests" :text="$guest->name" /></li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col gap-4">
                    @if (! empty($attending_guests))
                        <h2 class="mt-8 flex items-center gap-1 text-3xl">Any dietary requirements?</h2>
                        <div class="flex gap-6">
                            <x-radio-button model="has_dietary_requirements" :value="true" name="yes_dietary">
                                Yes
                            </x-radio-button>
                            <x-radio-button model="has_dietary_requirements" :value="false" name="no_dietary">
                                No
                            </x-radio-button>
                        </div>
                    @endif

                    @if (! empty($attending_guests) && $has_dietary_requirements)
                        @foreach ($rsvp->guests as $index => $guest)
                            @if (in_array($guest->id, $attending_guests))
                                <x-rsvp.dietary-requirements
                                    model="dietary_requirements.{{$guest->id}}"
                                    :guest="$guest"
                                />
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="flex flex-col gap-4">
                    <h2 class="mt-8 flex items-center gap-1 text-3xl">Song request</h2>
                    <label for="song_request" class="mb-2 block">
                        Add a song here to request it get played in the evening
                    </label>
                    <input
                        type="text"
                        id="song_request"
                        wire:model="song_request"
                        class="focus:ring-dark-green block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5"
                        placeholder=""
                    />
                </div>
            @elseif ($attending !== null)
                <label for="message" class="mb-2">
                    We're sorry you can't make it, use the box below to leave a message.
                </label>
                <textarea
                    id="message"
                    rows="4"
                    wire:model="message"
                    class="placeholder-dark-green border-dark-green focus:ring-dark-green block w-full rounded-lg border bg-white p-2.5 text-sm"
                    placeholder="Write your thoughts here..."
                ></textarea>
            @endif
            @if (($attending !== null && ! $attending) || ($attending && $has_dietary_requirements !== null))
                <div class="mt-8 flex justify-end">
                    <x-button wire:click.prevent="setStage('{{\App\Enums\RsvpStage::CONFIRM->value}}')" text="Next" />
                </div>
            @endif
        </form>
    @else
        <div class="py-6">
            <h2 class="pb-2 text-3xl uppercase">
                {{ $stage === \App\Enums\RsvpStage::CONFIRM->value ? 'Confirmation' : 'Overview' }}
            </h2>
            <div class="mb-12 flex flex-col gap-6 rounded py-4">
                @if ($attending)
                    @if ($rsvp->guests->whereIn('id', $attending_guests)->isNotEmpty())
                        <div>
                            <h3 class="mb-2 text-2xl">Attending</h3>
                            <ul class="flex flex-col gap-2">
                                @foreach ($rsvp->guests->whereIn('id', $attending_guests) as $guest)
                                    <li class="flex flex-col">
                                        <h4 class="text-xl">{{ $guest->name }}</h4>

                                        @if ($has_dietary_requirements)
                                            @php
                                                $requirements = collect($dietary_requirements[$guest->id] ?? [])
                                                    ->filter(fn ($value) => $value == true)
                                                    ->implode(fn ($value, $index) => $index, ', ');
                                            @endphp

                                            <span>
                                                {{ $requirements ?: 'None' }}
                                            </span>
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

                    @if ($song_request)
                        <div>
                            <h3 class="mb-2 text-2xl">Song request</h3>
                            <span>{{ $song_request }}</span>
                        </div>
                    @endif
                @else
                    {{ $message }}
                    <div>
                        <h3 class="mb-2 text-xl">Not Attending</h3>
                        <ul class="flex flex-col gap-2">
                            @foreach ($rsvp->guests as $guest)
                                <li class="flex flex-col">
                                    <h4 class="text-lg">{{ $guest->name }}</h4>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-col items-end gap-4 md:flex-row md:justify-between">
                    @if ($stage === \App\Enums\RsvpStage::CONFIRM->value)
                        <x-button
                            class="w-full border-none bg-transparent text-left hover:underline hover:shadow-none active:shadow-none md:w-fit"
                            wire:click.prevent="setStage('{{\App\Enums\RsvpStage::FORM->value}}')"
                        >
                            <span class="flex gap-2">
                                <x-bx-arrow-back class="w-5" />
                                <span>Back</span>
                            </span>
                        </x-button>

                        <x-button
                            wire:click.prevent="confirm()"
                            text="Confirm"
                            class="w-full md:w-52"
                            @click="if ({{(int) $attending}}) {
                                jsConfetti.addConfetti();
                                jsConfetti.addConfetti({emojis: ['🧡', '💍', '🎉', '🪩']});
                            }"
                        />
                    @else
                        <x-button wire:click.prevent="setStage('{{\App\Enums\RsvpStage::FORM->value}}')" text="Edit" />
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
