<div class="mt-6 flex flex-col gap-4">
    <h3 class="text-2xl">{{ $guest->name }}</h3>
    <ul class="grid grid-cols-2 gap-4 md:grid-cols-4">
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
