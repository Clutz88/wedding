<x-slot:description>{{ $page->seo->description }}</x-slot>
<x-section>
    <article class="prose">
        {!! $page->html !!}
    </article>
</x-section>
