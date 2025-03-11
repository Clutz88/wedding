<button
    class="border-dark-green hover:bg-medium-green focus:bg-medium-green active:bg-medium-green {{ $active ?? false ? 'bg-medium-green' : '' }} cursor-pointer rounded border-1 px-3 py-2 shadow"
    {{ $attributes->merge() }}
>
    {{ $text }}
</button>
