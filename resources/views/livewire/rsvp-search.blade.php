<x-section>
    <x-section-header title="RSVP">
        <p>
            This is where you can let us know if you can attend, changes can be made until
            {{ app(\App\Settings\Wedding::class)->rsvpDeadline()->format('jS F Y') }}.
        </p>
    </x-section-header>

    <form class="flex w-full flex-col items-start gap-4" wire:submit.prevent="search">
        <p>Enter your guest id:</p>
        <input
            type="text"
            class="border-dark-green bg-background focus:ring-dark-green rounded-xl border p-2"
            wire:model="rsvp_code"
        />
        <p class="text-sm text-red-800">{{ $error_message }}</p>
        <x-button type="submit" text="Submit" />
    </form>
</x-section>
