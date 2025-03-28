<button
    {{
        $attributes->merge([
            'class' => ($active ?? false ? 'shadow-[5px_5px_0px_0px_rgba(24,96,49)]' : '') . 'border-dark-green bg-background relative block w-52 cursor-pointer rounded-xl border-1 py-3 text-center hover:shadow-[5px_5px_0px_0px_rgba(24,96,49)] active:shadow-[5px_5px_0px_0px_rgba(24,96,49)]',
        ])
    }}
>
    {{ $text ?? $slot }}
</button>
