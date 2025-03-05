<div id="logo" class="my-4 flex flex-col items-center">
    <h1 class="mt-12 border-b-2 pb-1 text-7xl">
        {{ \App\Facades\Wedding::groom() }} & {{ \App\Facades\Wedding::bride() }}
    </h1>
    <span class="mt-2 text-lg font-semibold">{{ \App\Facades\Wedding::date()->format('l jS F') }}</span>
</div>
