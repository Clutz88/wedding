<label class="inline-flex items-center cursor-pointer">
    <input
        type="checkbox"
        id="{{ $id }}"
        value="{{ $value ?? $id }}"
        @if (isset($model))
            wire:model.live="{{$model}}"
        @endif
        class="sr-only peer"
    >
    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-medium-green dark:peer-checked:bg-medium-green"></div>
    <span class="ms-3">{{ $text }}</span>
</label>
