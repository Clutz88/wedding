<x-slot:description>{{ $page->seo->description }}</x-slot>
<x-section>
    <x-section-header :title="$page->title">{{ $page->subtitle }}</x-section-header>
    <div>
        {!! Blade::render($page->html) !!}
    </div>
</x-section>
