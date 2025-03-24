<li>
    <a
        href="{{ $href }}"
        wire:navigate
        class="{{ $active ? 'bg-peach' : '' }} block px-3 py-2 md:inline-block md:rounded-xl"
    >
        {{ $slot }}
    </a>
</li>
