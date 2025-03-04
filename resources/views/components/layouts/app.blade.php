<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
@if(isset($description))
        <meta name="description" content="{{ $description }}">
@endif
        <title>{{ $title ?? '' }} - Chris & Kate Wedding</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <link rel="preload" href="{{ Vite::asset('resources/fonts/BabybunnyRegular.woff2') }}" as="font" type="font/woff2">
{{--        <link rel="preload" href="{{ Vite::asset('resources/fonts/PlayfairDisplay-Regular.woff2') }}" as="font" type="font/woff2">--}}
{{--        <link rel="preload" href="{{ Vite::asset('resources/fonts/PlayfairDisplay-Medium.ttf') }}" as="font" type="font/ttf">--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col">
        <x-header />
        <div>
            {{ $slot }}
        </div>
    </body>
</html>
