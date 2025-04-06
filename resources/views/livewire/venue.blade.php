<x-slot:title>Useful Info</x-slot>
<x-section>
    <x-section-header title="Useful info">This is where you can find out all about things nearby.</x-section-header>

    <h2 class="flex items-center gap-2 text-3xl uppercase">
        <x-bx-map-pin class="inline w-7" />
        <span>Venue</span>
    </h2>
    <h3 class="mt-6 mb-1 text-2xl">Booking</h3>
    <p>
        To book a room at the croft hotel call
        <a href="tel:01919337409" class="tracking-wider underline">01919 337409</a>
        and quote "Chris and Kate's wedding"
    </p>
    <p class="pt-2 text-sm">
        There are limited rooms however don't worry we've selected a few
        <a href="#hotels-nearby" class="underline">hotels nearby</a>
        just in case.
    </p>
    <h3 class="mt-6 mb-1 text-2xl">Location</h3>
    <p class="mb-4">
        The Croft Hotel,
        <br />
        Northallerton Road,
        <br />
        Darlington,
        <br />
        DL2 2ST
    </p>
    <x-map />
    <h3 class="mt-6 mb-1 text-2xl">Parking</h3>
    <p>There is ample free parking to the front and rear of the building.</p>

    <h2 class="mt-14 flex items-center gap-2 text-3xl uppercase" id="hotels-nearby">
        <x-bx-hotel class="inline w-7" />
        <span>Hotels</span>
    </h2>
    <ul class="flex flex-col">
        <li>
            <h3 class="mt-6 mb-1 text-2xl">Boujee</h3>
            <div class="prose">
                <ul>
                    <li>
                        <x-external-link href="https://www.rockliffehall.com/">
                            Rockliffe Hall Hotel and Spa
                        </x-external-link>
                    </li>
                    <li>
                        <x-external-link href="https://www.blackwellgrangehotel.com/">
                            Blackwell Grange Hotel
                        </x-external-link>
                    </li>
                    <li>
                        <x-external-link href="https://middletonlodge.co.uk/">Middleton Lodge Estate</x-external-link>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <h3 class="mt-6 mb-1 text-2xl">Mid</h3>
            <div class="prose">
                <ul>
                    <li>
                        <x-external-link href="https://www.kingsdarlington.com/">
                            Mercure Darlington Kings Hotel
                        </x-external-link>
                    </li>
                    <li>
                        <x-external-link
                            href="https://www.premierinn.com/gb/en/hotels/england/county-durham/darlington/darlington-east-morton-park.html"
                        >
                            Premier Inn Darlington East
                        </x-external-link>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <h3 class="mt-6 mb-1 text-2xl">Budget</h3>
            <div class="prose">
                <ul>
                    <li>
                        <x-external-link href="https://www.travelodge.co.uk/hotels/221/Scotch-Corner-Skeeby-hotel">
                            Travelodge Scotch Corner Skeeby
                        </x-external-link>
                    </li>
                    <li>
                        <x-external-link href="https://thechequersinndalton.co.uk/">The Chequers Inn</x-external-link>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

    <h2 class="mt-14 flex items-center gap-2 text-3xl uppercase">
        <x-bx-taxi class="inline w-7" />
        <span>Taxis</span>
    </h2>
    <div class="prose mt-4">
        <ul class="flex flex-col gap-3">
            <li>
                United Taxis Darlington
                <br />
                <a href="tel:01325 282855" class="tracking-wider">01325 282855</a>
            </li>
            <li>
                Take Me Darlington
                <br />
                <a href="tel:01325 282828" class="tracking-wider">01325 282828</a>
            </li>
            <li>
                Uber also operate in Darlington -
                <a
                    href="uber://?action=setPickup&pickup=my_location&dropoff%5Bformatted_address%5D=The%20Croft%20Hotel&dropoff%5Blatitude%5D=54.482557&dropoff%5Blongitude%5D=-1.555825"
                    class="underline"
                >
                    Request a ride
                </a>
            </li>
        </ul>
    </div>
</x-section>
