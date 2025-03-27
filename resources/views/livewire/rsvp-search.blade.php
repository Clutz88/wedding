<x-section>
    <h1 class="pb-2 text-5xl">RSVP</h1>
    <p class="border-b-dark-green border-b border-dotted pb-8">This is where you can let us know if you can attend.</p>

    <form class="mt-8 flex w-full flex-col items-start gap-4" wire:submit.prevent="search">
        <p>Enter your code to access your RSVP</p>
        <input type="text" class="border-dark-green bg-background rounded-xl border p-2" wire:model="rsvp_code" />
        <p class="text-sm text-red-800">{{ $error_message }}</p>
        <x-button type="submit" text="Submit" />
    </form>
</x-section>
