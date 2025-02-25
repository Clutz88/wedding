<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'wedding' => app(\App\Settings\Wedding::class),
    ]);
});

Route::get('{page:slug}', function (\App\Models\Page $page) {
    return $page->html;
});
