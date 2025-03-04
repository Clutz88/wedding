<div class="flex justify-center">
    <div class="mx-8 mb-12 grow max-w-7xl">
        <h2 class="text-2xl mb-2">RSVP</h2>
        <form class="bg-light-green p-4 flex flex-col gap-4">
            <div class="flex flex-col gap-4">
                <h3>Can you attend as a day guest?</h3>
                <div class="flex gap-4">
                    <button
                        class="border-dark-green text-xl border-1 w-32 h-16  hover:bg-medium-green cursor-pointer focus:bg-medium-green active:bg-medium-green {{ $attending ? 'bg-medium-green' : '' }}"
                        wire:click.prevent="setAttending(true)"
                    >
                        Yes!
                    </button>
                    <button
                        class="border-dark-green text-xl border-1 w-32 h-16 hover:bg-medium-green cursor-pointer focus:bg-medium-green active:bg-medium-green {{ $attending === false ? 'bg-medium-green' : '' }}"
                        wire:click.prevent="setAttending(false)"
                    >
                        No
                    </button>
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
                            <li><label for="{{ $guest->id }}"><input type="checkbox" id="{{ $guest->id }}" value="{{ $guest->id }}" wire:model="attending_guests" /> {{$guest->name}}</label></li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col gap-4">
                    <h3>Are there any dietary requirements in your party?</h3>
                    <div class="flex gap-4">
                        <button
                            class="border-dark-green border-1 w-36 h-18 text-xl hover:bg-medium-green cursor-pointer focus:bg-medium-green active:bg-medium-green {{ $has_dietary_requirements ? 'bg-medium-green' : '' }}"
                            wire:click.prevent="setHasDietaryRequirements(true)"
                        >
                            Yes
                        </button>
                        <button
                            class="border-dark-green border-1 w-36 h-18 text-xl hover:bg-medium-green cursor-pointer focus:bg-medium-green active:bg-medium-green {{ $has_dietary_requirements === false ? 'bg-medium-green' : '' }}"
                            wire:click.prevent="setHasDietaryRequirements(false)"
                        >
                            No
                        </button>
                    </div>

                    @if ($has_dietary_requirements)
                        <p class="text-sm">Tell us about them</p>
                        @foreach($rsvp->guests as $guest)
                            @if(in_array($guest->id, $attending_guests))
                            <div>
                                <h4 class="font-semibold">{{ $guest->name }}</h4>
                                <ul class="grid grid-cols-2 md:grid-cols-4">
                                    <li><label for="helen_Vegetarian"><input type="checkbox" id="helen_Vegetarian"> Vegetarian</label></li>
                                    <li><label for="helen_Vegan"><input type="checkbox" id="helen_Vegan"> Vegan</label></li>
                                    <li><label for="helen_Pescarian"><input type="checkbox" id="helen_Pescarian"> Pescarian</label></li>
                                    <li><label for="helen_Dairy"><input type="checkbox" id="helen_Dairy"> Dairy Allergy</label></li>
                                    <li><label for="helen_Nut"><input type="checkbox" id="helen_Nut"> Nut Allergy</label></li>
                                    <li><label for="helen_Gluten"><input type="checkbox" id="helen_Gluten"> Gluten/Wheat</label></li>
                                    <li><label for="helen_Other"><input type="checkbox" id="helen_Other"> Other</label></li>
                                </ul>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            @endif
            @if($attending === false || ($attending === true && $has_dietary_requirements !== null))
                <div class="flex justify-end">
                    <button wire:click.prevent="next" class="border-dark-green border-1 w-36 h-18 text-xl hover:bg-medium-green focus:bg-medium-green active:bg-medium-green cursor-pointer">Next</button>
                </div>
            @endif
        </form>
    </div>
</div>
