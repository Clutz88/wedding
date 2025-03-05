<button
    class="border-dark-green hover:bg-medium-green focus:bg-medium-green active:bg-medium-green {{ $active ?? false ? 'bg-medium-green' : '' }} h-18 w-36 cursor-pointer rounded border-1 text-xl shadow"
    {{ $attributes->merge() }}
>
    {{ $text }}
</button>
