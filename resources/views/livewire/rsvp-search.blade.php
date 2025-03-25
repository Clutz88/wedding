<x-section>
    <h1 class="pb-2 text-5xl">RSVP</h1>
    <p class="border-b-dark-green border-b border-dotted pb-8">This is where you can let us know if you can attend.</p>

    <p class="mt-8">Enter your code to start your RSVP</p>
    <form class="flex w-full flex-col" wire:submit.prevent="search">
        <input type="text" class="border-dark-green rounded-xl border" wire:model="rsvp_code" />
        <button type="submit">Submit</button>
    </form>
</x-section>
