<div class="flex justify-center">
    <div class="mx-8 mb-12 grow max-w-7xl">
        <h2 class="text-2xl mb-2">RSVP</h2>
        <form class="bg-light-green p-4 flex flex-col gap-4">
            <div class="flex flex-col gap-4">
                <h3>Can you attend as a day guest?</h3>
                <div class="flex gap-4">
                    <x-button
                        :active="$attending"
                        wire:click.prevent="setAttending(true)"
                        text="Yes!"
                    />
                    <x-button
                        :active="$attending === false"
                        wire:click.prevent="setAttending(false)"
                        text="No"
                    />
                </div>
                @if($attending)
                    <p class="text-sm">Woohoo! We can't wait to see you there! 🥳</p>
                @endif
            </div>

            @if($attending)
                <div class="flex flex-col">
                    <h3>Who's Attending? <span class="text-xs">Tick all that apply</span></h3>
                    <ul>
                        @foreach($rsvp->guests as $index => $guest)
                            <li><x-toggle :id="$guest->id" model="attending_guests" :text="$guest->name" /></li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col gap-4">
                    @if (!empty($attending_guests))
                    <h3>Are there any dietary requirements in your party?</h3>
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

                    @if (!empty($attending_guests) && $has_dietary_requirements)
                        <p class="text-sm">Tell us about them</p>
                        @foreach($rsvp->guests as $guest)
                            @if(in_array($guest->id, $attending_guests))
                            <div>
                                <h4 class="font-semibold">{{ $guest->name }}</h4>
                                <ul class="grid grid-cols-2 md:grid-cols-4">
                                    @foreach(\App\Enums\DietaryRequirements::cases() as $requirement)

                                        <li>
                                            <x-toggle
                                                :id="$guest->id.'_'.$requirement->value"
                                                :value="$requirement->value"
                                                :text="$requirement->value"
                                            />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endif
            @if($attending === false || ($attending === true && $has_dietary_requirements !== null))
                <div class="flex justify-end">
                    <x-button
                        wire:click.prevent="next"
                        text="Next"
                    />
                </div>
            @endif
        </form>
    </div>
</div>
