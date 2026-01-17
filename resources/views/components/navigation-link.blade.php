<li>
    <a
        href="{{ $href }}"
        wire:navigate
        class="{{ $active ? 'md:border-peach bg-peach md:border-b-3 md:bg-transparent' : '' }} {{ $show ?? true ? '' : '!hidden'  }} block px-3 py-2 md:inline-block"
    >
        {{ $slot }}
    </a>
</li>
