<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="{{ $description ?? 'Find out information about the wedding of Chris and Kate, and fill out your RSVP form' }}"
        />

        <title>{{ $title ?? '' }} {{ isset($title) ? '-' : '' }} Chris & Kate Wedding</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

        <link
            rel="preload"
            href="{{ Vite::asset('resources/fonts/BrittanySignature.woff2') }}"
            as="font"
            type="font/woff2"
            crossorigin
        />
        <link
            rel="preload"
            href="{{ Vite::asset('resources/fonts/tropikal-bold.woff2') }}"
            as="font"
            type="font/woff2"
            crossorigin
        />
        <link
            rel="preload"
            href="{{ Vite::asset('resources/fonts/Quick.woff2') }}"
            as="font"
            type="font/woff2"
            crossorigin
        />
        {{-- <link rel="preconnect" href="https://fonts.googleapis.com" /> --}}
        {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> --}}
        {{-- <link --}}
        {{-- href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" --}}
        {{-- rel="stylesheet" --}}
        {{-- /> --}}

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @filepondScripts
    </head>
    <body class="!m-0 flex min-h-screen flex-col">
        <x-header />
        <div class="flex grow justify-items-center" role="main">
            {{ $slot }}
        </div>
        <x-footer />
    </body>
</html>
