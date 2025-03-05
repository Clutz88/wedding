<x-slot:description>{{ $page->seo->description }}</x-slot>
<div class="flex justify-center">
    <article class="prose mx-8 mb-12 grow max-w-7xl bg-light-green p-4">
        {!! $page->html !!}
    </article>
</div>
