<x-section>
    <p>Enter your code to start your RSVP</p>
    <form class="flex w-full flex-col" wire:submit.prevent="search">
        <input type="text" class="border-dark-green rounded-xl border" wire:model="rsvp_code" />
        <button type="submit">Submit</button>
    </form>
</x-section>
