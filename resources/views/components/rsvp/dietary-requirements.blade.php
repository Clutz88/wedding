<div class="flex flex-col gap-4">
    <h4 class="font-semibold">{{ $guest->name }}</h4>
    <ul class="grid grid-cols-2 gap-2 md:grid-cols-4">
        @foreach (\App\Enums\DietaryRequirements::cases() as $requirement)
            <li>
                <x-toggle
                    :id="$guest->id.'_'.$requirement->value"
                    :value="$requirement->value"
                    :text="$requirement->value"
                    model="{{$model}}.{{$requirement->value}}"
                />
            </li>
        @endforeach
    </ul>
</div>
