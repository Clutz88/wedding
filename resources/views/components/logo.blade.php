<div id="logo" class="flex flex-col items-center mt-12">
    <h1 class="text-7xl border-b-2 pb-1 mt-12">{{ \App\Facades\Wedding::groom() }} & {{ \App\Facades\Wedding::bride() }}</h1>
    <span class="mt-2 font-semibold text-lg">{{ \App\Facades\Wedding::date()->format('l jS F') }}</span>
</div>
