{{--<div class="absolute top-0 w-screen">--}}
{{--    <ul class="flex gap-4 my-2 w-fit mx-auto">--}}
{{--        <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}" wire:navigate>Home</a></li>--}}
{{--        <li><a href="/about-us" class="{{ Request::is('about-us') ? 'active' : '' }}" wire:navigate>About Us</a></li>--}}
{{--        <li><a href="/venue" class="{{ Request::is('venue') ? 'active' : '' }}" wire:navigate>Venue</a></li>--}}
{{--        <li><a href="/schedule" class="{{ Request::is('schedule') ? 'active' : '' }}" wire:navigate>Schedule</a></li>--}}
{{--        <li><a href="/rsvp" class="{{ Request::is('rsvp') ? 'active' : '' }}" wire:navigate>RSVP</a></li>--}}
{{--        <li><a href="/faq" class="{{ Request::is('faq') ? 'active' : '' }}" wire:navigate>FAQ</a></li>--}}
{{--    </ul>--}}
{{--</div>--}}
<nav>
    <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex cursor-pointer items-center justify-center p-2 w-10 h-10 text-sm  rounded-lg" aria-controls="navbar-hamburger" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5 text-dark-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full absolute z-50 bg-medium-green" id="navbar-hamburger">
        <ul class="flex flex-col font-medium mt-4 rounded-lg" id="mobile-nav">
            <li>
                <a href="/" wire:navigate class="block py-2 px-3 {{ Request::is('/') ? 'bg-light-green' : '' }}" aria-current="page">Home</a>
            </li>
            <li>
                <a href="/about-us" wire:navigate class="block py-2 px-3 {{ Request::is('about-us') ? 'bg-light-green' : '' }}">About Us</a>
            </li>
            <li>
                <a href="/venue" wire:navigate class="block py-2 px-3 {{ Request::is('venue') ? 'bg-light-green' : '' }}">Venue</a>
            </li>
            <li>
                <a href="/order-of-service" wire:navigate class="block py-2 px-3 {{ Request::is('order-of-service') ? 'bg-light-green' : '' }}">Order of Service</a>
            </li>
            <li>
                <a href="{{ route('rsvp', ['rsvp' => '019559f6-a374-72c5-ae21-03abb7be7cb4']) }}" wire:navigate class="block py-2 px-3 {{ Request::is('rsvp') ? 'bg-light-green' : '' }}">RSVP</a>
            </li>
        </ul>
    </div>
</nav>
