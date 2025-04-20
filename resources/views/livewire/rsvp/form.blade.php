<div>
    @if ($stage === \App\Enums\RsvpStage::FORM->value)
        <form class="flex flex-col rounded -mt-8">
            <div class="flex flex-col">
                <h2 class="flex items-center gap-1 text-3xl">
                    Can you attend as a{{ $type === \App\Enums\GuestType::EVENING->value ? 'n' : '' }} {{ $type }}
                    guest?
                </h2>
                <div class="flex gap-6">
                    <x-radio-button model="attending" :value="true" name="yes_attending">Yes</x-radio-button>
                    <x-radio-button model="attending" :value="false" name="no_attending">No</x-radio-button>
                </div>
                @if ($attending)
                    <p class="mt-4">Woohoo! We can't wait to see you there! 🥳</p>
                @endif
            </div>

            @if ($attending)
                <div class="flex flex-col">
                    <h2>Who's attending?</h2>
                    <ul class="inline-flex flex-col gap-5 mb-2">
                        @foreach ($rsvp->guests as $index => $guest)
                            <li class="inline-flex"><x-toggle :id="$guest->id" model="attending_guests" :text="$guest->name" /></li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col mb-2">
                    @if (! empty($attending_guests))
                        <h2>Any dietary requirements or allergies?</h2>
                        <div class="flex gap-6 mb-2">
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
                <div class="flex flex-col mb-2">
                    <h2>Song request</h2>
                    <input
                        type="text"
                        id="song_request"
                        wire:model="song_request"
                        class="focus:ring-dark-green block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5"
                        placeholder="Your favourite song..."
                    />
                </div>
            @elseif ($attending !== null)
                <h3>Leave a message for the Bride & Groom</h3>
                <textarea
                    id="message"
                    rows="4"
                    wire:model="message"
                    class=" border-dark-green focus:ring-dark-green block w-full rounded-lg border bg-white p-2.5"
                    placeholder="Start your message..."
                ></textarea>
            @endif
            @if (($attending !== null && ! $attending) || ($attending && $has_dietary_requirements !== null))
                <div class="mt-8">
                    <x-button
                        class="w-full md:w-52"
                        wire:click.prevent="setStage('{{\App\Enums\RsvpStage::CONFIRM->value}}')"
                        text="Next"
                    />
                </div>
            @endif
        </form>
    @else
        <div>
            <h2 class="pb-2">
                @if($stage === \App\Enums\RsvpStage::CONFIRM->value)
                    Review your details
                @elseif($attending)
                    Thank You!
                @else
                    Sorry you can't attend
                @endif
            </h2>
            @if ($stage === \App\Enums\RsvpStage::OVERVIEW->value)
                <p>
                    @if($attending)
                        Thanks for letting us know who will be attending.
                    @endif
                    If things change you can update your information
                    here until 1st September 2025.
                </p>
            @endif

            <div class="mb-12">
                @if ($attending)
                    @if ($rsvp->guests->whereIn('id', $attending_guests)->isNotEmpty())
                        <h3 class="mb-2">Attending</h3>
                        <ul class="flex flex-col gap-2">
                            @foreach ($rsvp->guests->whereIn('id', $attending_guests) as $guest)
                                <li>
                                    <p class="block w-fit grow">
                                        {{ $guest->name }} -
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
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if ($rsvp->guests->whereNotIn('id', $attending_guests)->isNotEmpty())
                        <h3 class="mb-2 text-xl">Not Attending</h3>
                        <ul class="flex flex-col gap-2">
                            @foreach ($rsvp->guests->whereNotIn('id', $attending_guests) as $guest)
                                <li class="flex flex-col">
                                    <p class="block w-fit grow">{{ $guest->name }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if ($song_request)
                        <h3 class="mb-2 text-2xl">Song request</h3>
                        <span>{{ $song_request }}</span>
                    @endif
                @else
                    <h3 class="mb-2 text-xl">Not Attending</h3>
                    <ul class="flex flex-col gap-2">
                        @foreach ($rsvp->guests as $guest)
                            <li class="flex flex-col">
                                <p class="block w-fit grow">{{ $guest->name }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="flex flex-col gap-4 mt-8">
                    @if ($stage === \App\Enums\RsvpStage::CONFIRM->value)
                        <x-button
                            wire:click.prevent="confirm()"
                            text="Confirm"
                            class="w-full md:w-52"
                            @click="if ({{(int) $attending}}) {
                                jsConfetti.addConfetti();
                                jsConfetti.addConfetti({emojis: ['🧡', '💍', '🎉', '🪩']});
                            }"
                        />
                        <x-button
                            class="w-full border-none bg-transparent text-left hover:underline hover:shadow-none active:shadow-none md:w-fit"
                            wire:click.prevent="setStage('{{\App\Enums\RsvpStage::FORM->value}}')"
                        >
                            <span class="flex gap-2">
                                <x-bx-arrow-back class="w-5" />
                                <span>Back</span>
                            </span>
                        </x-button>
                    @else
                        <x-button
                            class="w-full md:w-52"
                            wire:click.prevent="setStage('{{\App\Enums\RsvpStage::FORM->value}}')"
                            text="Update RSVP"
                        />
                        <h2>Want to learn more about the day?</h2>
                    <p>From food to order of service, we've got it covered!</p>
                    <x-link-button :href="route('home')" class="w-full md:w-52">Visit our homepage</x-link-button>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
