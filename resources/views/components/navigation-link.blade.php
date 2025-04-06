<li>
    <a
        href="{{ $href }}"
        wire:navigate
        class="{{ $active ? 'md:border-peach md:border-b-3 bg-peach md:bg-transparent' : '' }} block px-3 py-2 md:inline-block"
    >
        {{ $slot }}
    </a>
</li>
