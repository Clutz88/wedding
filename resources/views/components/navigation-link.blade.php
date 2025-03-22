<li>
    <a
        href="{{ $href }}"
        wire:navigate
        class="{{ $active ? 'bg-light-green' : '' }} block px-3 py-2 md:inline-block md:rounded"
    >
        {{ $slot }}
    </a>
</li>
