<?php

namespace App\Filament\Pages;

use Filament\Schemas\Schema;
use App\Settings\Venue;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class ManageVenue extends SettingsPage
{
    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    protected static string | \BackedEnum | null $navigationIcon = 'lineawesome-church-solid';

    protected static string $settings = Venue::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
