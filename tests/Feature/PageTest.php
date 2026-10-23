<?php

use App\Enums\PageStatus;
use App\Models\Page;
use App\Models\PageSeo;

function createCmsPage(array $attributes = []): Page
{
    $page = Page::create([
        'title' => 'Useful Info',
        'subtitle' => 'Everything you need to know',
        'slug' => 'useful-info',
        'html' => '<p>Parking is free.</p>',
        'status' => PageStatus::PUBLISHED->value,
        ...$attributes,
    ]);

    PageSeo::create([
        'page_id' => $page->id,
        'title' => 'Wedding Information',
        'description' => 'Travel, parking, and everything else.',
    ]);

    return $page;
}

it('renders a CMS page by its slug', function () {
    createCmsPage();

    $this->get(route('page', ['page' => 'useful-info']))
        ->assertOk()
        ->assertSee('<title>Wedding Information - Chris & Kate Wedding</title>', false)
        ->assertSee('Useful Info')
        ->assertSee('Everything you need to know')
        ->assertSee('Parking is free.', false)
        ->assertSee('Travel, parking, and everything else.');
});

it('returns not found for an unknown page slug', function () {
    $this->get(route('page', ['page' => 'does-not-exist']))
        ->assertNotFound();
});
