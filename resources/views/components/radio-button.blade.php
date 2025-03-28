<label class="flex items-center">
    <input
        type="radio"
        id="{{ $name }}"
        wire:model.live="{{ $model }}"
        value="{{ $value }}"
        class="checked:bg-dark-green h-6 w-6 border-gray-300 bg-gray-100"
    />
    <span class="ms-2" for="{{ $name }}">{{ $slot }}</span>
</label>
