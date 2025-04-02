<li>
    <a
        href="{{ $href }}"
        wire:navigate
        class="{{ $active ? 'border-peach border-b-3' : '' }} block px-3 py-2 md:inline-block"
    >
        {{ $slot }}
    </a>
</li>
