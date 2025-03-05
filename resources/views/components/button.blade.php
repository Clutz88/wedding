<button
    class="border-dark-green border-1 w-36 h-18 text-xl hover:bg-medium-green cursor-pointer focus:bg-medium-green active:bg-medium-green {{ $active ?? false ? 'bg-medium-green' : '' }}"
    {{ $attributes->merge() }}
>
    {{ $text }}
</button>
