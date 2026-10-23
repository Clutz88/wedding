<?php

use App\Providers\Filament\AdminPanelProvider;

arch('application code does not use debugging helpers')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'print_r'])
    ->not->toBeUsed();

arch('application code does not exit the process')
    ->expect(['die', 'exit'])
    ->not->toBeUsed();

arch('models extend the Eloquent model')
    ->expect('App\Models')
    ->toExtend('Illuminate\Database\Eloquent\Model')
    ->ignoring('App\Models\User');

arch('enums are enums')
    ->expect('App\Enums')
    ->toBeEnums();

arch('Livewire components extend the Livewire component')
    ->expect('App\Livewire')
    ->toExtend('Livewire\Component');

arch('Filament pages extend the Filament page')
    ->expect('App\Filament\Pages')
    ->toExtend('Filament\Pages\Page');

arch()->preset()->php();
arch()->preset()->security();
arch()->preset()->laravel()->ignoring(AdminPanelProvider::class);
