<button
    class="border-dark-green bg-background {{ $active ?? false ? 'shadow-[5px_5px_0px_0px_rgba(24,96,49)]' : '' }} relative block w-1/2 cursor-pointer rounded-xl border-1 py-3 text-center hover:shadow-[5px_5px_0px_0px_rgba(24,96,49)] active:shadow-[5px_5px_0px_0px_rgba(24,96,49)] md:w-52"
    {{ $attributes->merge() }}
>
    {{ $text }}
</button>
