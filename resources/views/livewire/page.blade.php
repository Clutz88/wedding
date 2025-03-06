<x-slot:description>{{ $page->seo->description }}</x-slot>
<x-section>
    <article class="prose max-w-full">
        {!! $page->html !!}
    </article>
</x-section>
