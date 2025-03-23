<x-slot:title>Useful Info</x-slot>
<x-section>
    <h1 class="text-5xl pb-2">Useful info</h1>
    <p class="border-b border-dotted border-b-dark-green pb-8">This is where you can find out all about things nearby.</p>
    <h2 class="text-3xl uppercase mt-8 flex items-center gap-1"><x-bx-map-pin class="w-7 inline" /> <span>Venue</span></h2>
    <h3 class="text-2xl mt-6 mb-1">Booking</h3>
    <p>To book a room at the croft hotel call <a href="tel:01919337409" class="underline">01919 337409</a> and quote "Chris and Kate's wedding"</p>
    <p class="pt-2 text-sm">There are limited rooms however don't worry we've selected a few <a href="#hotels-nearby" class="underline">hotels nearby</a> just in case.</p>
    <h3 class="text-2xl mt-6 mb-1">Location</h3>
    <a href="https://maps.app.goo.gl/ThM1hc122AGuPQNH8">
        <img src="{{Vite::asset('resources/images/map.png')}}" alt="" />
    </a>
    <h3 class="text-2xl mt-6 mb-1">Parking</h3>
    <p>There is ample free parking to the front and rear of the building.</p>
{{--    <iframe--}}
{{--        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2317.979447479482!2d-1.5565669139457456!3d54.480951206897366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487e99112356070b%3A0xf16d2690d31bda0!2sThe%20Croft%20Hotel!5e0!3m2!1sen!2suk!4v1740799138138!5m2!1sen!2suk"--}}
{{--        height="450"--}}
{{--        allowfullscreen=""--}}
{{--        loading="lazy"--}}
{{--        class="w-full border-0"--}}
{{--        referrerpolicy="no-referrer-when-downgrade"--}}
{{--    />--}}


    <h2 class="text-3xl uppercase mt-14 flex items-center gap-1" id="hotels-nearby"><x-bx-hotel class="w-7 inline" /> <span>Hotels</span></h2>
    <ul class="flex flex-col">
        <li>
            <h3 class="text-2xl mt-6 mb-1">Boujee</h3>
            <div class="prose">
                <ul>
                    <li><x-external-link href="https://www.rockliffehall.com/">Rockliffe Hall Hotel and Spa</x-external-link></li>
                    <li><x-external-link href="https://www.blackwellgrangehotel.com/">Blackwell Grange Hotel</x-external-link></li>
                    <li><x-external-link href="https://middletonlodge.co.uk/">Middleton Lodge Estate</x-external-link></li>
                </ul>
            </div>
        </li>
        <li>
            <h3 class="text-2xl mt-6 mb-1">Mid</h3>
            <div class="prose">
                <ul>
                    <li><x-external-link href="https://www.kingsdarlington.com/">Mercure Darlington Kings Hotel</x-external-link></li>
                    <li><x-external-link href="https://www.premierinn.com/gb/en/hotels/england/county-durham/darlington/darlington-east-morton-park.html">Premier Inn Darlington East</x-external-link></li>
                </ul>
            </div>
        </li>
        <li>
            <h3 class="text-2xl mt-6 mb-1">Budget</h3>
            <div class="prose">
                <ul>
                    <li><x-external-link href="https://www.travelodge.co.uk/hotels/221/Scotch-Corner-Skeeby-hotel">Travelodge Scotch Corner Skeeby</x-external-link></li>
                    <li><x-external-link href="https://thechequersinndalton.co.uk/">The Chequers Inn</x-external-link></li>
                </ul>
            </div>
        </li>
    </ul>

    <h2 class="text-3xl uppercase mt-14 flex items-center gap-1"><x-bx-taxi class="w-7 inline" /> <span>Taxis</span></h2>
    <div class="prose mt-4">
        <ul class="flex flex-col gap-3">
            <li>United Taxis Darlington <br /><a href="tel:01325 282855">01325 282855</a></li>
            <li>Take Me Darlington <br /><a href="tel:01325 282828">01325 282828</a></li>
            <li>Uber also operate in Darlington - <a href="uber://?action=setPickup&pickup=my_location&dropoff%5Bformatted_address%5D=The%20Croft%20Hotel&dropoff%5Blatitude%5D=54.482557&dropoff%5Blongitude%5D=-1.555825" class="underline">Request a ride</a></li>
        </ul>
    </div>
</x-section>
