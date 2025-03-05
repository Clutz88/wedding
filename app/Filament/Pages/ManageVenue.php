<?php

namespace App\Filament\Pages;

use App\Settings\Venue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageVenue extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationIcon = 'lineawesome-church-solid';

    protected static string $settings = Venue::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('address_line_one')
                    ->label('Street')
                    ->required(),
                TextInput::make('town')
                    ->label('Town'),
                TextInput::make('postcode')
                    ->label('Postcode'),
                TextInput::make('website'),
                TextInput::make('maps_link')
                    ->label('Google Maps Link'),
            ]);
    }
}
