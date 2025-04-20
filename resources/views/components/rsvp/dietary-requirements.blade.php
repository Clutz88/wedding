<div class="flex flex-col">
    <h3>{{ $guest->name }}</h3>
    <ul class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach (\App\Enums\DietaryRequirements::cases() as $requirement)
            <li class="inline-flex">
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
