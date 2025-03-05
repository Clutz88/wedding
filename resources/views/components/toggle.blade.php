<label class="inline-flex cursor-pointer items-center">
    <input
        type="checkbox"
        id="{{ $id }}"
        value="{{ $value ?? $id }}"
        @if (isset($model))
            wire:model.live="{{ $model }}"
        @endif
        class="peer sr-only"
    />
    <div
        class="peer peer-checked:bg-medium-green dark:peer-checked:bg-medium-green relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-full peer-checked:after:border-white rtl:peer-checked:after:-translate-x-full dark:border-gray-600"
    ></div>
    <span class="ms-3">{{ $text }}</span>
</label>
