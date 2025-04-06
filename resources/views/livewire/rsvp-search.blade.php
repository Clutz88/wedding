<x-section>
    <x-section-header title="RSVP">
        <p>This is where you can let us know if you can attend.</p>
        <p>Changes can be made until 1st august 2025.</p>
    </x-section-header>

    <form class="flex w-full flex-col items-start gap-4" wire:submit.prevent="search">
        <p>Enter your code to access your RSVP</p>
        <input
            type="text"
            class="border-dark-green bg-background focus:ring-dark-green rounded-xl border p-2"
            wire:model="rsvp_code"
        />
        <p class="text-sm text-red-800">{{ $error_message }}</p>
        <x-button type="submit" text="Submit" />
    </form>
</x-section>
